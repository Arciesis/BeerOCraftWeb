<?php

namespace App\Repository;

use App\Entity\WaterGrainRatio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WaterGrainRatio|null find($id, $lockMode = null, $lockVersion = null)
 * @method WaterGrainRatio|null findOneBy(array $criteria, array $orderBy = null)
 * @method WaterGrainRatio[]    findAll()
 * @method WaterGrainRatio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaterGrainRatioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WaterGrainRatio::class);
    }

    // /**
    //  * @return WaterGrainRatio[] Returns an array of WaterGrainRatio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WaterGrainRatio
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
