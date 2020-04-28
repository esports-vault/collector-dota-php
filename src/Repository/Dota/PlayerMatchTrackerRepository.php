<?php

namespace App\Repository\Dota;

use App\Entity\Dota\PlayerMatchTracker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerMatchTracker|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerMatchTracker|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerMatchTracker[]    findAll()
 * @method PlayerMatchTracker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerMatchTrackerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerMatchTracker::class);
    }

    // /**
    //  * @return PlayerMatchTracker[] Returns an array of PlayerMatchTracker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerMatchTracker
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
