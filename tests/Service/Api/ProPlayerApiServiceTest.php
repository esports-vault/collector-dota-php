<?php

namespace App\Tests\Service\Api;

use App\Entity\DotaProPlayer;
use App\Service\Api\ProPlayerApiService;
use App\Service\Client\StratzClientService;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ProPlayerApiServiceTest extends TestCase
{
    private $response;

    private $client;

    private $apiClient;

    private $logger;

    private $mockHandler;

    public function setUp() : void
    {
        $this->mockHandler = new MockHandler([]);
        $handlerStack = HandlerStack::create($this->mockHandler);

        $this->client = new Client([
            'handler' => $handlerStack,
            'verify' => false
        ]);

        $this->response = $this->createMock(Response::class);
        $this->apiClient = $this->createMock(StratzClientService::class);
        $this->logger = $this->createMock(LoggerInterface::class);
    }

    public function testMessageIsLoggedOnNon200() : void {

        $this->mockHandler->reset();
        $this->mockHandler->append(new Response(404));
        $this->apiClient->expects($this->once())->method('getClient')->willReturn($this->client);

        $this->logger->expects($this->once())->method('error')->with(
            'Could not retrieve pro players, got request error Client error: `GET /api/v1/Player/proSteamAccount` resulted in a `404 Not Found` response'
        );

        $service = new ProPlayerApiService($this->apiClient, $this->logger);

        $output = $service->retrieveEntities();
        $this->assertSame([], $output);
    }


    public function testResponseIsNotAValidJson() : void {

        $this->mockHandler->reset();
        $this->mockHandler->append(new Response(200, [], 'some content'));

        $this->apiClient->expects($this->once())->method('getClient')->willReturn($this->client);

        $this->logger->expects($this->once())->method('error')->with(
            'Can not deserialize data response from pro-steam-account API code: Syntax error'
        );

        $service = new ProPlayerApiService($this->apiClient, $this->logger);

        $output = $service->retrieveEntities();
        $this->assertSame([], $output);
    }

    public function testResponseIsValid() : void {

        $body = '{"11562":{"steamId":11562,"name":"René","isLocked":false,"isPro":false,"totalEarnings":0,"tiWins":0,"isTIWinner":false, ';
        $body .= '"twitterLink": "tl", ';
        $body .= '"twitchLink": "twl", ';
        $body .= '"facebookLink": "fbl" ,';
        $body .= '"instagramLink": "igl", ';
        $body .= '"youtubeLink": "yl", ';
        $body .= '"weiboLink": "wl"';
        $body .= '}}';

        $this->mockHandler->reset();
        $this->mockHandler->append(new Response(200, [], $body));
        $this->apiClient->expects($this->once())->method('getClient')->willReturn($this->client);

        $service = new ProPlayerApiService($this->apiClient, $this->logger);

        /**
         * @var DotaProPlayer $output
         */
        $output = $service->retrieveEntities()[0];

        $this->assertTrue($output->getIsMarkedPro());
        $this->assertFalse($output->getIsPro());
        $this->assertSame('tl', $output->getTwitter());
        $this->assertSame('twl', $output->getTwitch());
        $this->assertSame('wl', $output->getWeibo());
        $this->assertSame('yl', $output->getYoutube());
        $this->assertSame('fbl', $output->getFacebook());
        $this->assertSame('igl', $output->getInstagram());
    }


    public function testResponseIsValidAndEmpty() : void {

        $body = '{"11562":{"steamId":11562,"name":"René","isLocked":false,"isPro":false,"totalEarnings":0,"tiWins":0}}';

        $this->mockHandler->reset();
        $this->mockHandler->append(new Response(200, [], $body));
        $this->apiClient->expects($this->once())->method('getClient')->willReturn($this->client);

        $service = new ProPlayerApiService($this->apiClient, $this->logger);

        /**
         * @var DotaProPlayer $output
         */
        $output = $service->retrieveEntities()[0];

        $this->assertFalse($output->getIsPro());
        $this->assertFalse($output->getIsTiWinner());
        $this->assertSame('', $output->getTwitter());
        $this->assertSame('', $output->getTwitch());
        $this->assertSame('', $output->getWeibo());
        $this->assertSame('', $output->getYoutube());
        $this->assertSame('', $output->getFacebook());
        $this->assertSame('', $output->getInstagram());
    }
}
