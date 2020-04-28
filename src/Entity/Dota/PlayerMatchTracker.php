<?php

namespace App\Entity\Dota;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Dota\PlayerMatchTrackerRepository")
 * @ORM\Table(name="dota_player_match_tracker")
 */
class PlayerMatchTracker
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\Column(type="bigint")
     */
    private $accountId;

    /**
     * @ORM\Column(type="bigint")
     */
    private $matchId;

    public function getAccountId(): ?float
    {
        return $this->accountId;
    }

    public function setAccountId(float $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getMatchId(): ?float
    {
        return $this->matchId;
    }

    public function setMatchId(float $matchId): self
    {
        $this->matchId = $matchId;

        return $this;
    }
}
