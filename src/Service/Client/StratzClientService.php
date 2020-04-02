<?php


namespace App\Service\Client;


use GraphQL\Query;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

class StratzClientService
{
    private $client;

    private $graphClient;

    private $logger;

    public function  __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->client = new Client(
            [
                'base_uri' => 'https://api.stratz.com/',
                'timeout' => 10,
                'headers' => [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1laWQiOiJodHRwczovL3N0ZWFtY29tbXVuaXR5LmNvbS9vcGVuaWQvaWQvNzY1NjExOTg0MDAyODU5NTUiLCJ1bmlxdWVfbmFtZSI6IlNoRCIsIlN1YmplY3QiOiIzNGQ4NGI0MC05NjVkLTQ4OTgtOTM3MS0yOTVkNWJhZWUwOTMiLCJTdGVhbUlkIjoiNDQwMDIwMjI3IiwibmJmIjoxNTgxNzE3Mjg1LCJleHAiOjE2MTMyNTMyODUsImlhdCI6MTU4MTcxNzI4NSwiaXNzIjoiaHR0cHM6Ly9hcGkuc3RyYXR6LmNvbSJ9.FkoAbvCd58SZErBRJnUT3h9v2egsfXE98QqRAqC4VeA'
                ]
            ]
        );

        $this->graphClient = new \GraphQL\Client(
            'https://api.stratz.com/graphql',
            [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1laWQiOiJodHRwczovL3N0ZWFtY29tbXVuaXR5LmNvbS9vcGVuaWQvaWQvNzY1NjExOTg0MDAyODU5NTUiLCJ1bmlxdWVfbmFtZSI6IlNoRCIsIlN1YmplY3QiOiIzNGQ4NGI0MC05NjVkLTQ4OTgtOTM3MS0yOTVkNWJhZWUwOTMiLCJTdGVhbUlkIjoiNDQwMDIwMjI3IiwibmJmIjoxNTgxNzE3Mjg1LCJleHAiOjE2MTMyNTMyODUsImlhdCI6MTU4MTcxNzI4NSwiaXNzIjoiaHR0cHM6Ly9hcGkuc3RyYXR6LmNvbSJ9.FkoAbvCd58SZErBRJnUT3h9v2egsfXE98QqRAqC4VeA'
            ]
        );
    }

    public function getClient() : Client {
        return $this->client;
    }

    public function getGraphClient() : \GraphQL\Client
    {
        return $this->graphClient;
    }

    public function runGraphQuery(Query $query, array $variables = []) : ?\stdClass
    {
        try {
            $data = $this->graphClient->runRawQuery($query, false, $variables);

            return $data->getData();
        } catch (\Exception $exception) {
            $this->logger->error(
                'Can not retrieve data for GraphQuery: ' . $exception->getMessage(),
                [
                    'query' => (string) $query,
                    'variables' => $variables,
                    'error' => $exception->getMessage()
                ]
            );

            return null;
        }
    }
}