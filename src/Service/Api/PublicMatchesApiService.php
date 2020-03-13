<?php


namespace App\Service\Api;


use App\Service\Client\OpenDotaClientService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Log\LoggerInterface;

class PublicMatchesApiService
{
    private Client $client;

    private LoggerInterface $logger;

    public function __construct(OpenDotaClientService $client, LoggerInterface $logger)
    {
        $this->client = $client->getClient();
        $this->logger = $logger;
    }

    /**
     * Retrieves a list of 500 games that have an mmr higher
     * than the defined value. The limit is not configurable purposefully to
     * not hit api limits
     *
     * @param $lastMatchId
     * @param int $minimumRating
     * @return array
     */
    public function retrieveMatchIdentifiers($lastMatchId, $minimumRating = 6000) : array
    {
        $query = 'SELECT ' .
            'match_id ' .
            'from public_matches ' .
            'where avg_mmr is not null ' .
            'and avg_mmr > %d ' .
            'and match_id > %d ' .
            'order by match_id ASC ' .
            'limit 500';

        $query = sprintf($query, $minimumRating, $lastMatchId);

        try {
            $response = $this->client->get('/api/explorer', [
                'query' => [
                    'sql' => $query
                ]
            ]);
        } catch (ClientException $exception) {
            $this->logger->error(
                'Could not retrieve public matches from the opendota api call: ' . $exception->getMessage()
            );

            return [];
        }

        try {
            $data = json_decode(
                $response->getBody()->getContents(),
                false,
                512,
                JSON_THROW_ON_ERROR
            );

            $return = [];
            if (isset($data->rows)) {
                foreach ($data->rows as $row) {
                    $return[] = $row->match_id;
                }
            }

            return $return;

        } catch (\Exception $e) {
            $this->logger->error(
                'Can not deserialize data response from opendota api public matches api call: ' . $e->getMessage()
            );
        }

    }


}