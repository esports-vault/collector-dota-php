<?php


namespace App\Repository\Graph;


use App\Service\Client\StratzClientService;
use GraphQL\Exception\QueryError;
use GraphQL\Query;
use GraphQL\Variable;

class MatchGraphRepository
{
    private $client;

    public function __construct(StratzClientService $client)
    {
        $this->client = $client;
    }

    public function getInfoForMatchList(array $matches) : ?array
    {
        $query =
            (new Query('matches'))
            ->setSelectionSet([
                'id',
                'actualRank',
                'bracket',
                'barracksStatusDire',
                'barracksStatusRadiant',
                'averageImp',
                'bracket',
                'isStats',
                'clusterId',
                'didRadiantWin',
                'direTeamId',
                'radiantTeamId',
                'gameMode',
                'gameVersionId',
                'isStats',
                'leagueId',
                'lobbyType',
                'regionId',
                'replaySalt',
                'rank',
                'seriesId',
                'startDateTime',
                'tournamentId',
                'tournamentRound',
                'towerStatusDire',
                'towerStatusRadiant',
                (new Query('players'))
                    ->setSelectionSet([
                        'steamAccountId',
                        'partyId',
                        'role',
                        'roleBasic',
                        'level',
                        'lane',
                        'numDenies',
                        'numLastHits',
                        'kills',
                        'deaths',
                        'assists',
                        'gold',
                        'goldSpent',
                        'goldPerMinute',
                        'experiencePerMinute',
                        'imp',
                        'networth',
                        'heroId',
                        'heroDamage',
                        'heroHealing',
                        'towerDamage',
                        'isRadiant',
                        'isVictory',
                        'isRandom',
                        (new Query('stats'))
                            ->setSelectionSet([
                                'actionsPerMinute',
                                'campStack',
                                'tripsFountainPerMinute',
                                'deniesPerMinute',
                                'experiencePerMinute',
                                'goldPerMinute',
                                'healPerMinute',
                                'heroDamagePerMinute',
                                'lastHitsPerMinute',
                                'networthPerMinute',
                                'towerDamagePerMinute',
                                (new Query('abilityCastReport'))
                                    ->setSelectionSet([
                                        'abilityId',
                                        (new Query('targets'))
                                            ->setSelectionSet([
                                                'duration',
                                                'target',
                                                'count'
                                            ])
                                    ])
                                ]),
                    ])
            ])
            ->setVariables([new Variable('ids', '[Long]', true)])
            ->setArguments(['ids' => '$ids'])
        ;

        $data = $this->client->runGraphQuery($query, ['ids' => $matches]);

        if (null === $data) {
            return [];
        }

        return $data->matches;
    }
}