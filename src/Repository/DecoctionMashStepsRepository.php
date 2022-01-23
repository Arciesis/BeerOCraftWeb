<?php

namespace App\Repository;

use App\Entity\DecoctionMashSteps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DecoctionMashSteps|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecoctionMashSteps|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecoctionMashSteps[]    findAll()
 * @method DecoctionMashSteps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecoctionMashStepsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecoctionMashSteps::class);
    }

    // /**
    //  * @return DecoctionMashSteps[] Returns an array of DecoctionMashSteps objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DecoctionMashSteps
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
