<?php

namespace App\Message;


class DotaMatchMessage
{
    private int $matchId;

    public function __construct(int $matchId)
    {
        $this->matchId = $matchId;
    }

    public function getMatchId() : int
    {
        return $this->matchId;
    }

    final public static function create(int $matchId) : DotaMatchMessage {
        return new self($matchId);
    }
}