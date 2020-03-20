<?php

namespace App\Repository;

use App\Entity\Tendancy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tendancy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tendancy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tendancy[]    findAll()
 * @method Tendancy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TendancyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tendancy::class);
    }

    // /**
    //  * @return Tendancy[] Returns an array of Tendancy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tendancy
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
