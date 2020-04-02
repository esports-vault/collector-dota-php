<?php

namespace App\Repository;

use App\Entity\DotaMatchPlayerMinuteStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DotaMatchPlayerMinuteStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method DotaMatchPlayerMinuteStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method DotaMatchPlayerMinuteStats[]    findAll()
 * @method DotaMatchPlayerMinuteStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DotaMatchPlayerMinuteStatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DotaMatchPlayerMinuteStats::class);
    }

    // /**
    //  * @return DotaMatchPlayerMinuteStats[] Returns an array of DotaMatchPlayerMinuteStats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DotaMatchPlayerMinuteStats
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
