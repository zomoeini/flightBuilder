<?php

namespace App\Repository;

use App\Entity\Airlines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Airlines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Airlines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Airlines[]    findAll()
 * @method Airlines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AirlinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Airlines::class);
    }

    // /**
    //  * @return Airlines[] Returns an array of Airlines objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Airlines
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
