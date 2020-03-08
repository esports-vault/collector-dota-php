<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass="DotaProPlayerRepository")
 * @ORM\Table(name="dota_pro_player",
 *     indexes={@ORM\Index(name="dota_pro_player_steam_idx", columns={"steam_id"})}
 * )
 * @codeCoverageIgnore
 */
class DotaProPlayer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="steam_id")
     */
    private $steamId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $realName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $teamId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sponsor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLocked;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMarkedPro;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalEarnings;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $romanizedRealName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $roles;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $aliases = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $signatureHeroes = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $countries = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tiWins;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTiWinner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twitch;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $weibo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSteamId(): ?int
    {
        return $this->steamId;
    }

    public function setSteamId(int $steamId): self
    {
        $this->steamId = $steamId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRealName(): ?string
    {
        return $this->realName;
    }

    public function setRealName(?string $realName): self
    {
        $this->realName = $realName;

        return $this;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function setTeamId(?int $teamId): self
    {
        $this->teamId = $teamId;

        return $this;
    }

    public function getSponsor(): ?string
    {
        return $this->sponsor;
    }

    public function setSponsor(?string $sponsor): self
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    public function getIsLocked(): ?bool
    {
        return $this->isLocked;
    }

    public function setIsLocked(bool $isLocked): self
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    public function getIsMarkedPro(): ?bool
    {
        return $this->isMarkedPro;
    }

    public function setIsMarkedPro(bool $isMarkedPro): self
    {
        $this->isMarkedPro = $isMarkedPro;

        return $this;
    }

    public function getIsPro(): ?bool
    {
        return $this->isPro;
    }

    public function setIsPro(bool $isPro): self
    {
        $this->isPro = $isPro;

        return $this;
    }

    public function getTotalEarnings(): ?int
    {
        return $this->totalEarnings;
    }

    public function setTotalEarnings(?int $totalEarnings): self
    {
        $this->totalEarnings = $totalEarnings;

        return $this;
    }

    public function getBirthday(): ?DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getRomanizedRealName(): ?string
    {
        return $this->romanizedRealName;
    }

    public function setRomanizedRealName(?string $romanizedRealName): self
    {
        $this->romanizedRealName = $romanizedRealName;

        return $this;
    }

    public function getRoles(): ?int
    {
        return $this->roles;
    }

    public function setRoles(?int $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getAliases(): ?array
    {
        return $this->aliases;
    }

    public function setAliases(?array $aliases): self
    {
        $this->aliases = $aliases;

        return $this;
    }

    public function getSignatureHeroes(): ?array
    {
        return $this->signatureHeroes;
    }

    public function setSignatureHeroes(?array $signatureHeroes): self
    {
        $this->signatureHeroes = $signatureHeroes;

        return $this;
    }

    public function getCountries(): ?array
    {
        return $this->countries;
    }

    public function setCountries(?array $countries): self
    {
        $this->countries = $countries;

        return $this;
    }

    public function getTiWins(): ?int
    {
        return $this->tiWins;
    }

    public function setTiWins(?int $tiWins): self
    {
        $this->tiWins = $tiWins;

        return $this;
    }

    public function getIsTiWinner(): ?bool
    {
        return $this->isTiWinner;
    }

    public function setIsTiWinner(bool $isTiWinner): self
    {
        $this->isTiWinner = $isTiWinner;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getTwitch(): ?string
    {
        return $this->twitch;
    }

    public function setTwitch(?string $twitch): self
    {
        $this->twitch = $twitch;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getWeibo(): ?string
    {
        return $this->weibo;
    }

    public function setWeibo(?string $weibo): self
    {
        $this->weibo = $weibo;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

}