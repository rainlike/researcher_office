<?php

namespace App\Repository;

use App\Entity\ScientificInterest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScientificInterest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScientificInterest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScientificInterest[]    findAll()
 * @method ScientificInterest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScientificInterestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScientificInterest::class);
    }

    // /**
    //  * @return ScientificInterest[] Returns an array of ScientificInterest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScientificInterest
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
