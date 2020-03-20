<?php

namespace App\Repository;

use App\Entity\ImperfectionType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ImperfectionType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImperfectionType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImperfectionType[]    findAll()
 * @method ImperfectionType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImperfectionTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImperfectionType::class);
    }

    // /**
    //  * @return ImperfectionType[] Returns an array of ImperfectionType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImperfectionType
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
