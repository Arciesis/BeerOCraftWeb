<?php

namespace App\Repository;

use App\Entity\BeerRecipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BeerRecipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method BeerRecipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method BeerRecipe[]    findAll()
 * @method BeerRecipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeerRecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BeerRecipe::class);
    }

    public function findPublicAndOwnedByUser($user)
    {
        return $this->createQueryBuilder('b')
            ->where('b.isPublic = true OR b.realOwner = :user')
            ->setParameter('user', $user)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return BeerRecipe[] Returns an array of BeerRecipe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BeerRecipe
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
