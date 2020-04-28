<?php


namespace App\Service\Dota\Player;


use App\Entity\Dota\PlayerMatchTracker;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class PlayerMatchTrackerService
{
    private $entityManager;

    private $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function getLastTrackedGameId($accountId) : ?int
    {
        /**
         * @var PlayerMatchTracker $playerMatchTracker
         */
        $playerMatchTracker = $this->entityManager->getRepository(PlayerMatchTracker::class)->findOneBy(
            ['accountId' => $accountId]
        );

        if (null === $playerMatchTracker) {
            $this->logger->error(
                "Account {$accountId} has no tracked games to get history from."
            );

            return null;
        }
        return $playerMatchTracker->getMatchId();
    }

    public function updateLastTrackedGame($accountId, $matchId)
    {
        $playerMatchTracker = $this->entityManager->getRepository(PlayerMatchTracker::class)->findOneBy(
            ['accountId' => $accountId]
        );
        $playerMatchTracker->setMatchId($matchId);

        $this->entityManager->persist($playerMatchTracker);
        $this->entityManager->flush();
    }
}