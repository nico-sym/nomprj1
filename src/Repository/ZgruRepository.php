<?php

namespace App\Repository;

use App\Entity\Zgru;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zgru|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zgru|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zgru[]    findAll()
 * @method Zgru[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZgruRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zgru::class);
    }

    // /**
    //  * @return Zgru[] Returns an array of Zgru objects
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
    public function findOneBySomeField($value): ?Zgru
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /*
    public function findOneByIdJoinedToUser(int $gruId): ?Zgru
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p, c
            FROM App\Entity\Zgru p
            INNER JOIN p.User c
            WHERE p.id = :id'
        )->setParameter('id', $gruId);

        return $query->getOneOrNullResult();
    }
    */
}
