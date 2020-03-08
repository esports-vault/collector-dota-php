<?php

namespace App\Tests\Service\Data;

use App\Entity\DotaProPlayer;
use App\Repository\DotaProPlayerRepository;
use App\Service\Data\DotaProPlayerDataService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class DotaProPlayerDataServiceTest extends TestCase
{
    private $repository;

    private $entityManager;

    public function setUp() : void {
        $this->repository = $this->createMock(DotaProPlayerRepository::class);
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
    }

    public function testNoStorageOnExisting() : void
    {
        $this->repository->expects($this->once())->method('findOneBy')->willReturn([]);
        $this->entityManager->expects($this->never())->method('persist');

        $service = new DotaProPlayerDataService($this->repository, $this->entityManager);

        $player = new DotaProPlayer();
        $player->setSteamId(1234);

        $service->updateProfessionalPlayers(
            [$player]
        );
    }

    public function testCallsStorageOnNonExisting() : void
    {
        $this->repository->expects($this->once())->method('findOneBy')->willReturn(null);
        $this->entityManager->expects($this->once())->method('persist');
        $this->entityManager->expects($this->once())->method('flush');


        $service = new DotaProPlayerDataService($this->repository, $this->entityManager);

        $player = new DotaProPlayer();
        $player->setSteamId(1234);

        $service->updateProfessionalPlayers(
            [$player]
        );
    }
}
