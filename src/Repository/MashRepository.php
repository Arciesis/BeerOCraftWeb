<?php

namespace App\Repository;

use App\Entity\Mash;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mash|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mash|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mash[]    findAll()
 * @method Mash[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MashRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mash::class);
    }

    // /**
    //  * @return Mash[] Returns an array of Mash objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mash
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
