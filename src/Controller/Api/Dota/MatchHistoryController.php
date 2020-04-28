<?php

namespace App\Controller\Api\Dota;

use App\Api\Payload\Dota\Steam\PlayerMatchHistoryPayload;
use App\Api\Request\Steam\Steam\PlayerMatchHistoryRequest;
use App\Api\Service\Dota\Steam\PlayerMatchHistoryService;
use App\Message\Dota\Steam\MatchMessage;
use App\Service\Dota\Player\PlayerMatchTrackerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MatchHistoryController extends AbstractController
{
    /**
     * Retrieves the last max 100 games for a given player and sends them over the message
     * bus to the queue so match information can be retrieved.
     *
     * @Route("/api/dota/match/history/{accountId}", name="api_dota_match_history_account")
     * @param integer $accountId
     * @param PlayerMatchHistoryService $playerMatchHistoryService
     * @param PlayerMatchTrackerService $playerMatchTrackerService
     * @param MessageBusInterface $messageBus
     * @return JsonResponse
     */
    public function matchHistoryPlayer(
        int $accountId,
        PlayerMatchHistoryService $playerMatchHistoryService,
        PlayerMatchTrackerService $playerMatchTrackerService,
        MessageBusInterface $messageBus
    ) : JsonResponse
    {
        $lastMatchId = $playerMatchTrackerService->getLastTrackedGameId($accountId);
        if ($lastMatchId === null) {
            return $this->json([
               'total' => 0
            ]);
        }

        $matchIds = $playerMatchHistoryService->getMatchHistoryForPlayer(
            new PlayerMatchHistoryPayload(
                $accountId
            )
        );

        /**
         * Remove all match ids that are smaller than last known matchId
         */
        $matchIds = array_filter(
            $matchIds,
            static function ($e) use ($lastMatchId) {
                return $e > $lastMatchId;
            }
        );

        foreach ($matchIds as $matchId) {
            $messageBus->dispatch(MatchMessage::create($matchId));
        }

        $newMatchId = $lastMatchId;
        if (count($matchIds) > 0) {
            $newMatchId = max($matchIds);
            $playerMatchTrackerService->updateLastTrackedGame($accountId, $newMatchId);
        }

        return $this->json([
            'total' => count($matchIds),
            'initialMatch' => $lastMatchId,
            'newMatch' => $newMatchId
        ]);
    }
}
