<?php


namespace App\Api\Service\Dota\Steam;


use App\Api\Payload\Dota\Steam\PlayerMatchHistoryPayload;
use App\Api\Request\Dota\Steam\Exception\CallFailedException;
use App\Api\Request\Dota\Steam\PlayerMatchHistoryRequest;
use Psr\Log\LoggerInterface;

class PlayerMatchHistoryService
{
    /**
     * @var PlayerMatchHistoryRequest
     */
    private $requester;

    /**
     * @var Logger
     */
    private $logger;

    public function __construct(PlayerMatchHistoryRequest $requester, LoggerInterface $logger)
    {
        $this->requester = $requester;
        $this->logger = $logger;
    }

    public function getMatchHistoryForPlayer(PlayerMatchHistoryPayload $payload) : array
    {
        $matches = [];

        try {
            $response = $this->requester->getMatches($payload);

            if ($response->status === 15) {
                //TODO: Implement notifications here as needed, missing too much context for now (Issue #14)
                return $matches;
            }

            foreach($response->matches as $match) {
                $matches[] = $match->match_id;
            }

        } catch (CallFailedException $exception) {
            $this->logger->error(
                $exception->getMessage(),
                [$exception->getCode()]
            );
        }

        return $matches;
    }
}