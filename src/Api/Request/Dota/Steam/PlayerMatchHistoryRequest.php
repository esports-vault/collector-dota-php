<?php


namespace App\Api\Request\Dota\Steam;


use App\Api\Client\SteamApiClient;
use App\Api\Payload\Dota\Steam\PlayerMatchHistoryPayload;
use App\Api\Request\Dota\Steam\Exception\CallFailedException;
use GuzzleHttp\Exception\RequestException;

class PlayerMatchHistoryRequest
{
    private $client;

    public function __construct(SteamApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param PlayerMatchHistoryPayload $payload
     * @return \stdClass
     * @throws CallFailedException
     */
    public function getMatches(PlayerMatchHistoryPayload $payload) : \stdClass
    {
        try {
            $response = $this->client->getClient()->request(
                'GET',
                $this->client->getPlayerMatchHistoryEndpoint(),
                [
                    'query' => [
                        'key' => $this->client->getApiKey(),
                        'account_id' => $payload->getAccountId()
                    ]
                ]
            );
        } catch (RequestException $e) {
            $responseCode = 0;
            $responseMessage = $e->getMessage();

            if ($e->hasResponse()) {
                $responseMessage = $e->getResponse()->getBody()->getContents();
                $responseCode = $e->getResponse()->getStatusCode();
            }

            throw new CallFailedException(
                "Api call failed for endpoint {$this->client->getPlayerMatchHistoryEndpoint()} 
                with arguments[accountId: {$payload->getAccountId()}]and payload $responseMessage",
                $responseCode
            );
        }

        try {
            $response = json_decode(
                $response->getBody()->getContents(),
                false,
                512,
                JSON_THROW_ON_ERROR
            );

            return $response->result;

        } catch (\JsonException $exception) {
            throw new CallFailedException(
                "API response could not be deserialized for endpoint {$this->client->getPlayerMatchHistoryEndpoint()} 
                with arguments[accountId: {$payload->getAccountId()}] and payload {$response->getBody()->getContents()}"
            );
        }
    }
}