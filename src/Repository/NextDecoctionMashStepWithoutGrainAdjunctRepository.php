<?php

namespace App\Repository;

use App\Entity\NextDecoctionMashStepWithoutGrainAdjunct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NextDecoctionMashStepWithoutGrainAdjunct|null find($id, $lockMode = null, $lockVersion = null)
 * @method NextDecoctionMashStepWithoutGrainAdjunct|null findOneBy(array $criteria, array $orderBy = null)
 * @method NextDecoctionMashStepWithoutGrainAdjunct[]    findAll()
 * @method NextDecoctionMashStepWithoutGrainAdjunct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NextDecoctionMashStepWithoutGrainAdjunctRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NextDecoctionMashStepWithoutGrainAdjunct::class);
    }

    // /**
    //  * @return NextDecoctionMashStepWithoutGrainAdjunct[] Returns an array of NextDecoctionMashStepWithoutGrainAdjunct objects
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
    public function findOneBySomeField($value): ?NextDecoctionMashStepWithoutGrainAdjunct
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
