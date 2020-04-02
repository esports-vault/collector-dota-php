<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DotaMatchPlayerAbilityRepository")
 */
class DotaMatchPlayerAbility
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DotaMatchPlayer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchPlayer;

    /**
     * @ORM\Column(type="integer")
     */
    private $abilityId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $targetId;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private $targetHeroId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchPlayer(): ?DotaMatchPlayer
    {
        return $this->matchPlayer;
    }

    public function setMatchPlayer(?DotaMatchPlayer $dotaMatchPlayer): self
    {
        $this->matchPlayer = $dotaMatchPlayer;

        return $this;
    }

    public function getAbilityId(): ?int
    {
        return $this->abilityId;
    }

    public function setAbilityId(int $abilityId): self
    {
        $this->abilityId = $abilityId;

        return $this;
    }

    public function getTargetId(): ?int
    {
        return $this->targetId;
    }

    public function setTargetId(int $targetId): self
    {
        $this->targetId = $targetId;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getTargetHeroId(): ?int
    {
        return $this->targetHeroId;
    }

    public function setTargetHeroId(int $targetHeroId): self
    {
        $this->targetHeroId = $targetHeroId;

        return $this;
    }

    final public static function create(
        DotaMatchPlayer $dotaMatchPlayer, $abilityId, $targetId, $targetHeroId, $duration, $count
    ) : DotaMatchPlayerAbility
    {
        $instance = new self();
        $instance->setMatchPlayer($dotaMatchPlayer);
        $instance->setAbilityId($abilityId);
        $instance->setTargetId($targetId);
        $instance->setCount($count);
        $instance->setDuration($duration);
        $instance->setTargetHeroId($targetHeroId);

        return $instance;
    }


}
