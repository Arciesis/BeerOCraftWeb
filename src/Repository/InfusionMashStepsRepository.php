<?php

namespace App\Repository;

use App\Entity\InfusionMashSteps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfusionMashSteps|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfusionMashSteps|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfusionMashSteps[]    findAll()
 * @method InfusionMashSteps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfusionMashStepsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfusionMashSteps::class);
    }

    // /**
    //  * @return InfusionMashSteps[] Returns an array of InfusionMashSteps objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfusionMashSteps
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
