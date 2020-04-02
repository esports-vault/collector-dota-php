<?php

namespace App\Repository;

use App\Entity\DotaMatchPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DotaMatchPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method DotaMatchPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method DotaMatchPlayer[]    findAll()
 * @method DotaMatchPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DotaMatchPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DotaMatchPlayer::class);
    }
}
