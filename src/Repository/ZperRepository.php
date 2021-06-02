<?php

namespace App\Repository;

use App\Entity\Zper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zper|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zper|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zper[]    findAll()
 * @method Zper[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZperRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zper::class);
    }

    // /**
    //  * @return Zper[] Returns an array of Zper objects
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
    public function findOneBySomeField($value): ?Zper
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
