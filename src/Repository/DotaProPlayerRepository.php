<?php

namespace App\Repository;

use App\Entity\DotaProPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DotaProPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method DotaProPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method DotaProPlayer[]    findAll()
 * @method DotaProPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @codeCoverageIgnore
 */
class DotaProPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DotaProPlayer::class);
    }
}
