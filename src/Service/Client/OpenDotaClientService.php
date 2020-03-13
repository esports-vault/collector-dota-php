<?php

namespace App\Service\Client;


use GuzzleHttp\Client;

class OpenDotaClientService
{
    private $client;

    public function  __construct()
    {
        $this->client = new Client(
            [
                'base_uri' => 'https://api.opendota.com/',
                'timeout' => 10,
            ]
        );
    }

    public function getClient() : Client {
        return $this->client;
    }
}