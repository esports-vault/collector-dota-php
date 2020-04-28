<?php


namespace App\Message\Dota\Steam;


class MatchMessage
{
    private $matchId;

    /**
     * @return mixed
     */
    public function getMatchId()
    {
        return $this->matchId;
    }

    /**
     * @param mixed $matchId
     */
    public function setMatchId($matchId): void
    {
        $this->matchId = $matchId;
    }

    public static function create($matchId)
    {
        $instance = new self();
        $instance->setMatchId($matchId);
        return $instance;
    }
}