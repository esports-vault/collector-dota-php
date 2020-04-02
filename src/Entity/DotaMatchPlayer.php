<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DotaMatchPlayerRepository")
 */
class DotaMatchPlayer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $accountId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DotaMatch")
     * @ORM\JoinColumn(nullable=false)
     */
    private $match;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $partyId;

    /**
     * @ORM\Column(type="integer")
     */
    private $role;

    /**
     * @ORM\Column(type="integer")
     */
    private $roleBasic;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $lane;

    /**
     * @ORM\Column(type="integer")
     */
    private $numDenies;

    /**
     * @ORM\Column(type="integer")
     */
    private $numLastHits;

    /**
     * @ORM\Column(type="integer")
     */
    private $kills;

    /**
     * @ORM\Column(type="integer")
     */
    private $deaths;

    /**
     * @ORM\Column(type="integer")
     */
    private $assists;

    /**
     * @ORM\Column(type="integer")
     */
    private $gold;

    /**
     * @ORM\Column(type="integer")
     */
    private $goldSpent;

    /**
     * @ORM\Column(type="integer")
     */
    private $goldPerMinute;

    /**
     * @ORM\Column(type="integer")
     */
    private $experiencePerMinute;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $imp;

    /**
     * @ORM\Column(type="integer")
     */
    private $networth;

    /**
     * @ORM\Column(type="integer")
     */
    private $heroId;

    /**
     * @ORM\Column(type="integer")
     */
    private $heroDamage;

    /**
     * @ORM\Column(type="integer")
     */
    private $heroHealing;

    /**
     * @ORM\Column(type="integer")
     */
    private $towerDamage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRadiant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVictory;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRandom;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     * @return DotaMatchPlayer
     */
    public function setAccountId($accountId) : DotaMatchPlayer
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function getMatch(): ?DotaMatch
    {
        return $this->match;
    }

    public function setMatch(?DotaMatch $match): self
    {
        $this->match = $match;

        return $this;
    }

    public function getPartyId(): ?int
    {
        return $this->partyId;
    }

    public function setPartyId(?int $partyId): self
    {
        $this->partyId = $partyId;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRoleBasic(): ?int
    {
        return $this->roleBasic;
    }

    public function setRoleBasic(int $roleBasic): self
    {
        $this->roleBasic = $roleBasic;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getLane(): ?int
    {
        return $this->lane;
    }

    public function setLane(int $lane): self
    {
        $this->lane = $lane;

        return $this;
    }

    public function getNumDenies(): ?int
    {
        return $this->numDenies;
    }

    public function setNumDenies(int $numDenies): self
    {
        $this->numDenies = $numDenies;

        return $this;
    }

    public function getNumLastHits(): ?int
    {
        return $this->numLastHits;
    }

    public function setNumLastHits(int $numLastHits): self
    {
        $this->numLastHits = $numLastHits;

        return $this;
    }

    public function getKills(): ?int
    {
        return $this->kills;
    }

    public function setKills(int $kills): self
    {
        $this->kills = $kills;

        return $this;
    }

    public function getDeaths(): ?int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): self
    {
        $this->deaths = $deaths;

        return $this;
    }

    public function getAssists(): ?int
    {
        return $this->assists;
    }

    public function setAssists(int $assists): self
    {
        $this->assists = $assists;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getGoldSpent(): ?int
    {
        return $this->goldSpent;
    }

    public function setGoldSpent(int $goldSpent): self
    {
        $this->goldSpent = $goldSpent;

        return $this;
    }

    public function getGoldPerMinute(): ?int
    {
        return $this->goldPerMinute;
    }

    public function setGoldPerMinute(int $goldPerMinute): self
    {
        $this->goldPerMinute = $goldPerMinute;

        return $this;
    }

    public function getExperiencePerMinute(): ?int
    {
        return $this->experiencePerMinute;
    }

    public function setExperiencePerMinute(int $experiencePerMinute): self
    {
        $this->experiencePerMinute = $experiencePerMinute;

        return $this;
    }

    public function getImp(): ?int
    {
        return $this->imp;
    }

    public function setImp(?int $imp): self
    {
        $this->imp = $imp;

        return $this;
    }

    public function getNetworth(): ?int
    {
        return $this->networth;
    }

    public function setNetworth(int $networth): self
    {
        $this->networth = $networth;

        return $this;
    }

    public function getHeroId(): ?int
    {
        return $this->heroId;
    }

    public function setHeroId(int $heroId): self
    {
        $this->heroId = $heroId;

        return $this;
    }

    public function getHeroDamage(): ?int
    {
        return $this->heroDamage;
    }

    public function setHeroDamage(int $heroDamage): self
    {
        $this->heroDamage = $heroDamage;

        return $this;
    }

    public function getHeroHealing(): ?int
    {
        return $this->heroHealing;
    }

    public function setHeroHealing(int $heroHealing): self
    {
        $this->heroHealing = $heroHealing;

        return $this;
    }

    public function getTowerDamage(): ?int
    {
        return $this->towerDamage;
    }

    public function setTowerDamage(int $towerDamage): self
    {
        $this->towerDamage = $towerDamage;

        return $this;
    }

    public function getIsRadiant(): ?bool
    {
        return $this->isRadiant;
    }

    public function setIsRadiant(bool $isRadiant): self
    {
        $this->isRadiant = $isRadiant;

        return $this;
    }

    public function getIsVictory(): ?bool
    {
        return $this->isVictory;
    }

    public function setIsVictory(bool $isVictory): self
    {
        $this->isVictory = $isVictory;

        return $this;
    }

    public function getIsRandom(): ?bool
    {
        return $this->isRandom;
    }

    public function setIsRandom(bool $isRandom): self
    {
        $this->isRandom = $isRandom;

        return $this;
    }
}
