<?php


namespace App\Service\Data;


use App\Entity\DotaProPlayer;
use App\Repository\DotaProPlayerRepository;
use Doctrine\ORM\EntityManagerInterface;

class DotaProPlayerDataService
{
    private DotaProPlayerRepository $repository;

    private EntityManagerInterface $entityManager;

    public function __construct(DotaProPlayerRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param DotaProPlayer[] $proPlayers
     */
    public function updateProfessionalPlayers(array $proPlayers) : void
    {
        $batchSize = 100;
        $i = 0;
        foreach ($proPlayers as $proPlayer)
        {
            $record = $this->repository->findOneBy(['steamId' => $proPlayer->getSteamId()]);

            if (null === $record) {
                $this->entityManager->persist($proPlayer);
                $i++;
            }

            if (($i % $batchSize) === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
            }
        }

        $this->entityManager->flush();
        $this->entityManager->clear();
    }
}