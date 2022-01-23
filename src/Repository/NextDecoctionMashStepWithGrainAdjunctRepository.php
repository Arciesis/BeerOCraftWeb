<?php

namespace App\Repository;

use App\Entity\NextDecoctionMashStepWithGrainAdjunct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NextDecoctionMashStepWithGrainAdjunct|null find($id, $lockMode = null, $lockVersion = null)
 * @method NextDecoctionMashStepWithGrainAdjunct|null findOneBy(array $criteria, array $orderBy = null)
 * @method NextDecoctionMashStepWithGrainAdjunct[]    findAll()
 * @method NextDecoctionMashStepWithGrainAdjunct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NextDecoctionMashStepWithGrainAdjunctRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NextDecoctionMashStepWithGrainAdjunct::class);
    }

    // /**
    //  * @return NextDecoctionMashStepWithGrainAdjunct[] Returns an array of NextDecoctionMashStepWithGrainAdjunct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NextDecoctionMashStepWithGrainAdjunct
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
