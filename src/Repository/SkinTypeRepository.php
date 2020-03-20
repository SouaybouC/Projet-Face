<?php

namespace App\Repository;

use App\Entity\SkinType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SkinType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkinType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkinType[]    findAll()
 * @method SkinType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkinTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkinType::class);
    }

    // /**
    //  * @return SkinType[] Returns an array of SkinType objects
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
    public function findOneBySomeField($value): ?SkinType
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
