<?php

namespace App\Tests\Service\Client;

use App\Service\Client\OpenDotaClientService;
use PHPUnit\Framework\TestCase;

class OpenDotaClientServiceTest extends TestCase
{
    public function testTimeoutIsSetOnClient() : void
    {
        $client = new OpenDotaClientService();
        $this->assertSame(10, $client->getClient()->getConfig('timeout'));
    }

    public function testEndpointIsSet() : void
    {
        $client = new OpenDotaClientService();

        $this->assertSame(
            'https://api.opendota.com/',
            (string) $client->getClient()->getConfig('base_uri')
        );
    }
}
