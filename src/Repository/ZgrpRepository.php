<?php

namespace App\Repository;

use App\Entity\Zgrp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zgrp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zgrp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zgrp[]    findAll()
 * @method Zgrp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZgrpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zgrp::class);
    }

    // /**
    //  * @return Zgrp[] Returns an array of Zgrp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zgrp
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
