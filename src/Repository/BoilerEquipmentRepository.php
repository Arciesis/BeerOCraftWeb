<?php

namespace App\Repository;

use App\Entity\BoilerEquipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoilerEquipment|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoilerEquipment|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoilerEquipment[]    findAll()
 * @method BoilerEquipment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoilerEquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoilerEquipment::class);
    }

    // /**
    //  * @return BoilerEquipment[] Returns an array of BoilerEquipment objects
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
    public function findOneBySomeField($value): ?BoilerEquipment
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
