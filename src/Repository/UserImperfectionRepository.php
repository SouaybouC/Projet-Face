<?php

namespace App\Repository;

use App\Entity\UserImperfection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserImperfection|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserImperfection|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserImperfection[]    findAll()
 * @method UserImperfection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserImperfectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserImperfection::class);
    }

    // /**
    //  * @return UserImperfection[] Returns an array of UserImperfection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserImperfection
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
