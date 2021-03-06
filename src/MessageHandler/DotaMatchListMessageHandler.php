<?php


namespace App\MessageHandler;


use App\Entity\DotaMatch;
use App\Entity\DotaMatchPlayer;
use App\Entity\DotaMatchPlayerAbility;
use App\Entity\DotaMatchPlayerMinuteStats;
use App\Mapper\DotaMatchMapper;
use App\Mapper\DotaMatchPlayerMapper;
use App\Message\DotaMatchMessageList;
use App\MessageHandler\Task\AbilityCastTask;
use App\MessageHandler\Task\StatsPerMinuteTask;
use App\Repository\Graph\MatchGraphRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DotaMatchListMessageHandler implements MessageHandlerInterface
{
    private MatchGraphRepository $matchGraphRepository;

    private EntityManagerInterface $entityManager;

    public function __construct(
        MatchGraphRepository $matchGraphRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->matchGraphRepository = $matchGraphRepository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(DotaMatchMessageList $dotaMatchMessageList)
    {
        $requestedMatchIds = [];
        $receivedMatchIds = [];
        $matchMapper = DotaMatchMapper::build();
        $matchPlayerMapper = DotaMatchPlayerMapper::build();

        foreach ($dotaMatchMessageList->getMatches() as $dotaMatchMessage) {
            $requestedMatchIds[] = $dotaMatchMessage->getMatchId();
        }
        $matches = $this->matchGraphRepository->getInfoForMatchList($requestedMatchIds);


        foreach ($matches as $match) {

            $receivedMatchIds[] = $match->id;

            $this->entityManager->persist(
                $matchEntity = $matchMapper->map($match, DotaMatch::class)
            );

            /**
             * Map heroes to players for further usage,
             * needs to be looped ahead before the full loop
             */
            $heroes = [];
            foreach ($match->players as $player){
                $heroes[$player->heroId] = $player->steamAccountId;
            }

            foreach ($match->players as $player){

                /**
                 * @var DotaMatchPlayer $matchPlayer
                 */
                $matchPlayerEntity = $matchPlayerMapper->map($player, DotaMatchPlayer::class);
                $matchPlayerEntity->setMatch($matchEntity);

                $this->entityManager->persist(
                    $matchPlayerEntity
                );

                $statsPerMinute = StatsPerMinuteTask::execute($player, $matchPlayerEntity);

                /** Save stats per minute */
                foreach ($statsPerMinute as $statPerMinute) {
                    $this->entityManager->persist(
                        $statPerMinute
                    );
                }

                /** Save the bloody ability usages */
                $abilityEntities = AbilityCastTask::execute($player, $matchPlayerEntity, $heroes);
                foreach($abilityEntities as $abilityEntity) {
                    $this->entityManager->persist(
                        $abilityEntity
                    );
                }
            }
        }

        // TODO: requeue if any difference
        $difference = array_diff($requestedMatchIds, $receivedMatchIds);

        $this->entityManager->flush();
    }
}