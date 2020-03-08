<?php

namespace App\Tests\Service\Client;


use App\Service\Client\StratzClientService;
use PHPUnit\Framework\TestCase;

class StratzClientServiceTest extends TestCase
{
    public function testTimeoutIsSetOnClient() : void
    {
        $client = new StratzClientService();
        $this->assertSame(10, $client->getClient()->getConfig('timeout'));
    }

    public function testEndpointIsSet() : void
    {
        $client = new StratzClientService();

        $this->assertSame(
            'https://api.stratz.com/',
            (string) $client->getClient()->getConfig('base_uri')
        );
    }

    public function testBearerIsDefined() : void
    {
        $client = new StratzClientService();
        $headers = $client->getClient()->getConfig('headers');

        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertContains('Bearer', $headers['Authorization']);
    }
}
