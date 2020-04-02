<?php


namespace App\Message;


class DotaMatchMessageList
{
    /**
     * @var DotaMatchMessage[]
     */
    private $matches = [];

    public function __construct(array $matchIdList)
    {
        foreach ($matchIdList as $matchItem) {
            $this->matches[] = DotaMatchMessage::create($matchItem);
        }
    }

    public static function create(array $matchIdList) : DotaMatchMessageList
    {
        return new self($matchIdList);
    }

    /**
     * @return DotaMatchMessage[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

}