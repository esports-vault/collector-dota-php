<?php


namespace App\Api\Payload\Dota\Steam;


class PlayerMatchHistoryPayload
{
    private $accountId;

    /**
     * PlayerMatchHistoryPayload constructor.
     *
     * @param int $accountId - Account for which to get match history
     */
    public function __construct(int $accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return int accountId
     */
    public function getAccountId(): int
    {
        return $this->accountId;
    }
}