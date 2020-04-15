<?php

namespace App\Tests\Service\Client;


use App\Service\Client\StratzClientService;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class StratzClientServiceTest extends TestCase
{
    private $logger;

    public function setUp()
    {
        $this->logger = $this->createMock(LoggerInterface::class);
    }

    public function testTimeoutIsSetOnClient() : void
    {
        $client = new StratzClientService($this->logger);
        $this->assertSame(10, $client->getClient()->getConfig('timeout'));
    }

    public function testEndpointIsSet() : void
    {
        $client = new StratzClientService($this->logger);

        $this->assertSame(
            'https://api.stratz.com/',
            (string) $client->getClient()->getConfig('base_uri')
        );
    }

    public function testBearerIsDefined() : void
    {
        $client = new StratzClientService($this->logger);
        $headers = $client->getClient()->getConfig('headers');

        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertContains('Bearer', $headers['Authorization']);
    }
}
