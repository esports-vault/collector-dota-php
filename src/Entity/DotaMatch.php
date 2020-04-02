<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DotaMatchRepository")
 */
class DotaMatch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leagueId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seriesId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tournamentId;

    /**
     * @ORM\Column(type="integer")
     */
    private $clusterId;

    /**
     * @ORM\Column(type="integer")
     */
    private $regionId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $direTeamId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $radiantTeamId;

    /**
     * @ORM\Column(type="integer")
     */
    private $actualRank;

    /**
     * @ORM\Column(type="integer", name="ranking")
     */
    private $rank;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $averageImp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isStats;

    /**
     * @ORM\Column(type="boolean")
     */
    private $didRadiantWin;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameMode;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameVersionId;

    /**
     * @ORM\Column(type="integer")
     */
    private $lobbyType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $replaySalt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDateTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $barracksStatusDire;

    /**
     * @ORM\Column(type="integer")
     */
    private $barracksStatusRadiant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tournamentRound;

    /**
     * @ORM\Column(type="integer")
     */
    private $towerStatusDire;

    /**
     * @ORM\Column(type="integer")
     */
    private $towerStatusRadiant;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getLeagueId(): ?int
    {
        return $this->leagueId;
    }

    public function setLeagueId(?int $leagueId): self
    {
        $this->leagueId = $leagueId;

        return $this;
    }

    public function getSeriesId(): ?int
    {
        return $this->seriesId;
    }

    public function setSeriesId(?int $seriesId): self
    {
        $this->seriesId = $seriesId;

        return $this;
    }

    public function getTournamentId(): ?int
    {
        return $this->tournamentId;
    }

    public function setTournamentId(?int $tournamentId): self
    {
        $this->tournamentId = $tournamentId;

        return $this;
    }

    public function getClusterId(): ?int
    {
        return $this->clusterId;
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->clusterId = $clusterId;

        return $this;
    }

    public function getRegionId(): ?int
    {
        return $this->regionId;
    }

    public function setRegionId(int $regionId): self
    {
        $this->regionId = $regionId;

        return $this;
    }

    public function getActualRank(): ?string
    {
        return $this->actualRank;
    }

    public function setActualRank(string $actualRank): self
    {
        $this->actualRank = $actualRank;

        return $this;
    }

    public function getBarracksStatusDire(): ?int
    {
        return $this->barracksStatusDire;
    }

    public function setBarracksStatusDire(int $barracksStatusDire): self
    {
        $this->barracksStatusDire = $barracksStatusDire;

        return $this;
    }

    public function getBarracksStatusRadiant(): ?int
    {
        return $this->barracksStatusRadiant;
    }

    public function setBarracksStatusRadiant(int $barracksStatusRadiant): self
    {
        $this->barracksStatusRadiant = $barracksStatusRadiant;

        return $this;
    }

    public function getAverageImp(): ?int
    {
        return $this->averageImp;
    }

    public function setAverageImp(int $averageImp): self
    {
        $this->averageImp = $averageImp;

        return $this;
    }

    public function getIsStats(): ?bool
    {
        return $this->isStats;
    }

    public function setIsStats(bool $isStats): self
    {
        $this->isStats = $isStats;

        return $this;
    }

    public function getDidRadiantWin(): ?bool
    {
        return $this->didRadiantWin;
    }

    public function setDidRadiantWin(bool $didRadiantWin): self
    {
        $this->didRadiantWin = $didRadiantWin;

        return $this;
    }

    public function getDireTeamId(): ?int
    {
        return $this->direTeamId;
    }

    public function setDireTeamId(int $direTeamId): self
    {
        $this->direTeamId = $direTeamId;

        return $this;
    }

    public function getRadiantTeamId(): ?int
    {
        return $this->radiantTeamId;
    }

    public function setRadiantTeamId(?int $radiantTeamId): self
    {
        $this->radiantTeamId = $radiantTeamId;

        return $this;
    }

    public function getGameMode(): ?int
    {
        return $this->gameMode;
    }

    public function setGameMode(int $gameMode): self
    {
        $this->gameMode = $gameMode;

        return $this;
    }

    public function getGameVersionId(): ?int
    {
        return $this->gameVersionId;
    }

    public function setGameVersionId(int $gameVersionId): self
    {
        $this->gameVersionId = $gameVersionId;

        return $this;
    }

    public function getLobbyType(): ?int
    {
        return $this->lobbyType;
    }

    public function setLobbyType(int $lobbyType): self
    {
        $this->lobbyType = $lobbyType;

        return $this;
    }

    public function getReplaySalt(): ?string
    {
        return $this->replaySalt;
    }

    public function setReplaySalt(string $replaySalt): self
    {
        $this->replaySalt = $replaySalt;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeInterface
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getTournamentRound(): ?int
    {
        return $this->tournamentRound;
    }

    public function setTournamentRound(?int $tournamentRound): self
    {
        $this->tournamentRound = $tournamentRound;

        return $this;
    }

    public function getTowerStatusDire(): ?int
    {
        return $this->towerStatusDire;
    }

    public function setTowerStatusDire(int $towerStatusDire): self
    {
        $this->towerStatusDire = $towerStatusDire;

        return $this;
    }

    public function getTowerStatusRadiant(): ?int
    {
        return $this->towerStatusRadiant;
    }

    public function setTowerStatusRadiant(int $towerStatusRadiant): self
    {
        $this->towerStatusRadiant = $towerStatusRadiant;

        return $this;
    }
}
