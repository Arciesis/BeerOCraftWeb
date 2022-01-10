<?php

namespace App\Repository;

use App\Entity\BoilerEquipement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoilerEquipement|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoilerEquipement|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoilerEquipement[]    findAll()
 * @method BoilerEquipement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoilerEquipementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoilerEquipement::class);
    }

    // /**
    //  * @return BoilerEquipement[] Returns an array of BoilerEquipement objects
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
    public function findOneBySomeField($value): ?BoilerEquipement
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
