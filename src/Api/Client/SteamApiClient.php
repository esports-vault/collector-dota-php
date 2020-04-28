<?php


namespace App\Api\Client;


use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class SteamApiClient
{
    private $params;

    private $client;

    public function __construct(ContainerBagInterface $containerBag)
    {
        $this->params = $containerBag->get('app.steam');

        $this->client = new Client(
            [
                'base_uri' => $this->params['endpoint'],
                'timeout' => 10,
            ]
        );
    }

    /**
     * @return string
     */
    public function getApiKey() : string
    {
        return $this->params['key'];
    }

    /**
     * @return string
     */
    public function getPlayerMatchHistoryEndpoint() : string
    {
        return $this->params['endpoint-dota-match-history'];
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}