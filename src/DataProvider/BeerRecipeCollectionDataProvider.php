<?php

namespace App\DataProvider;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryResultCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\BeerRecipe;
use App\Repository\BeerRecipeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Asset\Context\ContextInterface;
use Symfony\Component\Security\Core\Security;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension;

final class BeerRecipeCollectionDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{

    private $beerRecipeRepository;
    private $security;
    private $paginationExtension;
    private $context;
    private $managerRegistry;

    public function __construct(
        BeerRecipeRepository $beerRecipeRepository,
        Security $security,
        PaginationExtension $paginationExtension,
        ManagerRegistry $managerRegistry
    ) {
        $this->beerRecipeRepository = $beerRecipeRepository;
        $this->security = $security;
        $this->paginationExtension = $paginationExtension;
        $this->managerRegistry = $managerRegistry;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        $this->context = $context;
        return $resourceClass === BeerRecipe::class;
    }

    /**
     * @inheritDoc
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        if ($this->security->getUser()) {
            $queryBuilder = $this->managerRegistry
                ->getManagerForClass($resourceClass)
                ->getRepository($resourceClass)
                ->createQueryBuilder('b')
                ->where('b.isPublic = true OR b.realOwner = :user')
                ->setParameter('user', $this->security->getUser())
                ->orderBy('b.id', 'ASC')
                ;
        } else {
            $queryBuilder = $this->managerRegistry
                ->getManagerForClass($resourceClass)
                ->getRepository($resourceClass)
                ->createQueryBuilder('b')
                ->where('b.isPublic = true')
                ->orderBy('b.id', 'ASC')
                ;
        }

//        $responseArray = $this->beerRecipeRepository->findPublicAndOwnedByUser($this->security->getUser());
        $this->paginationExtension->applyToCollection($queryBuilder,new QueryNameGenerator() , $resourceClass, $operationName, $context);

        if ($this->paginationExtension instanceof QueryResultCollectionExtensionInterface
            && $this->paginationExtension->supportsResult($resourceClass, $operationName, $this->context)) {

            return $this->paginationExtension->getResult(
                $queryBuilder,
                $resourceClass,
                $operationName,
                $this->context
            );
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
