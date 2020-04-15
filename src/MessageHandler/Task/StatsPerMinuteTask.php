<?php


namespace App\MessageHandler\Task;


use App\Entity\DotaMatchPlayer;
use App\Entity\DotaMatchPlayerMinuteStats;

class StatsPerMinuteTask
{

    /**
     * @param $playerPayload
     * @param DotaMatchPlayer $dotaMatchPlayer
     * @return DotaMatchPlayerMinuteStats[]
     */
    public static function execute($playerPayload, DotaMatchPlayer $dotaMatchPlayer) : array
    {
        $entities = [];

        $supportedEvents = [
            'actionsPerMinute' => 'apm',
            'campStack' => 'stack',
            'tripsFountainPerMinute' => 'fountain_trips',
            'deniesPerMinute' => 'denies',
            'experiencePerMinute' => 'experience',
            'goldPerMinute' => 'gold',
            'healPerMinute' => 'heal',
            'heroDamagePerMinute' => 'hero_damage',
            'lastHitsPerMinute' => 'last_hits',
            'networthPerMinute' => 'net_worth',
            'towerDamagePerMinute' => 'tower_damage',
        ];

        /** Save actions per minute */
        foreach ($supportedEvents as $key => $name) {

            if (null === $playerPayload->stats || null === $playerPayload->stats->$key) {
                continue;
            }

            foreach ($playerPayload->stats->$key as $minute => $count) {
                $minuteStatsEntity = DotaMatchPlayerMinuteStats::create(
                    $dotaMatchPlayer,
                    $name,
                    $minute,
                    $count
                );

                $entities[] = $minuteStatsEntity;
            }
        }

        return $entities;
    }
}