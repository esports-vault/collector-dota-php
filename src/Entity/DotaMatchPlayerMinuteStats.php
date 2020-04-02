<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DotaMatchPlayerMinuteStatsRepository")
 */
class DotaMatchPlayerMinuteStats
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
    private $minute;

    /**
     * @ORM\Column(type="string", name="action_name", length=255)
     */
    private $actionName;

    /**
     * @ORM\Column(type="integer", name="action_value")
     */
    private $actionValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchPlayer(): ?DotaMatchPlayer
    {
        return $this->matchPlayer;
    }

    public function setMatchPlayer(?DotaMatchPlayer $matchPlayer): self
    {
        $this->matchPlayer = $matchPlayer;

        return $this;
    }

    public function getMinute(): ?int
    {
        return $this->minute;
    }

    public function setMinute(int $minute): self
    {
        $this->minute = $minute;

        return $this;
    }

    public function getActionName(): ?string
    {
        return $this->actionName;
    }

    public function setActionName(string $actionName): self
    {
        $this->actionName = $actionName;

        return $this;
    }

    public function getActionValue(): ?int
    {
        return $this->actionValue;
    }

    public function setActionValue(int $actionValue): self
    {
        $this->actionValue = $actionValue;

        return $this;
    }

    final public static function create(DotaMatchPlayer $matchPlayer, $name, $minute, $value) : self
    {
        $entity = new self();
        $entity->setMinute($minute);
        $entity->setActionValue($value);
        $entity->setActionName($name);
        $entity->setMatchPlayer($matchPlayer);

        return $entity;
    }
}
