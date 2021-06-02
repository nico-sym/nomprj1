<?php

namespace App\Repository;

use App\Entity\Zact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zact[]    findAll()
 * @method Zact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zact::class);
    }

    // /**
    //  * @return Zact[] Returns an array of Zact objects
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
    public function findOneBySomeField($value): ?Zact
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
