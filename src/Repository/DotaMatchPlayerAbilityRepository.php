<?php

namespace App\Repository;

use App\Entity\DotaMatchPlayerAbility;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DotaMatchPlayerAbility|null find($id, $lockMode = null, $lockVersion = null)
 * @method DotaMatchPlayerAbility|null findOneBy(array $criteria, array $orderBy = null)
 * @method DotaMatchPlayerAbility[]    findAll()
 * @method DotaMatchPlayerAbility[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DotaMatchPlayerAbilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DotaMatchPlayerAbility::class);
    }

    // /**
    //  * @return DotaMatchPlayerAbility[] Returns an array of DotaMatchPlayerAbility objects
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
    public function findOneBySomeField($value): ?DotaMatchPlayerAbility
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
