<?php


namespace App\Service\Client;


use GuzzleHttp\Client;

class StratzClientService
{
    private $client;

    public function  __construct()
    {
        $this->client = new Client(
            [
                'base_uri' => 'https://api.stratz.com/',
                'timeout' => 10,
                'headers' => [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1laWQiOiJodHRwczovL3N0ZWFtY29tbXVuaXR5LmNvbS9vcGVuaWQvaWQvNzY1NjExOTg0MDAyODU5NTUiLCJ1bmlxdWVfbmFtZSI6IlNoRCIsIlN1YmplY3QiOiIzNGQ4NGI0MC05NjVkLTQ4OTgtOTM3MS0yOTVkNWJhZWUwOTMiLCJTdGVhbUlkIjoiNDQwMDIwMjI3IiwibmJmIjoxNTgxNzE3Mjg1LCJleHAiOjE2MTMyNTMyODUsImlhdCI6MTU4MTcxNzI4NSwiaXNzIjoiaHR0cHM6Ly9hcGkuc3RyYXR6LmNvbSJ9.FkoAbvCd58SZErBRJnUT3h9v2egsfXE98QqRAqC4VeA'
                ]
            ]
        );
    }

    public function getClient() : Client {
        return $this->client;
    }
}