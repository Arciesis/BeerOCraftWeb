<?php

namespace App\Repository;

use App\Entity\BeerStyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BeerStyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method BeerStyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method BeerStyle[]    findAll()
 * @method BeerStyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeerStyleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BeerStyle::class);
    }

    // /**
    //  * @return BeerStyle[] Returns an array of BeerStyle objects
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
    public function findOneBySomeField($value): ?BeerStyle
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
