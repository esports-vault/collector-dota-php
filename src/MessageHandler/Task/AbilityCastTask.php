<?php

namespace App\MessageHandler\Task;

use App\Entity\DotaMatchPlayer;
use App\Entity\DotaMatchPlayerAbility;
use App\Entity\DotaMatchPlayerMinuteStats;

class AbilityCastTask
{
    /**
     * @param $playerPayload
     * @param DotaMatchPlayer $dotaMatchPlayer
     * @return DotaMatchPlayerAbility[]
     */
    public static function execute($playerPayload, DotaMatchPlayer $dotaMatchPlayer, $heroes) : array
    {
        $entities = [];

        if (null === $playerPayload->stats || null === $playerPayload->stats->abilityCastReport) {
            return $entities;
        }

        /** Save the bloody ability usages */
        foreach($playerPayload->stats->abilityCastReport as $abilityCastReport) {
            foreach ($abilityCastReport->targets as $target) {
                $entities[] = DotaMatchPlayerAbility::create(
                    $dotaMatchPlayer,
                    $abilityCastReport->abilityId,
                    $heroes[$target->target],
                    $target->target,
                    $target->duration,
                    $target->count,
                    );
            }
        }

        return$entities;
    }
}