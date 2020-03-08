<?php


namespace App\Service\Api;

use App\Entity\DotaProPlayer;
use App\Entity\DotaPlayerSocialAccount;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use GuzzleHttp\Client;
use App\Service\Client\StratzClientService;
use GuzzleHttp\Exception\ClientException;
use phpDocumentor\Reflection\Types\Iterable_;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use \stdClass;

class ProPlayerApiService
{
    private Client $client;

    private LoggerInterface $logger;

    public function __construct(
        StratzClientService $stratzClientService,
        LoggerInterface $logger)
    {
        $this->client = $stratzClientService->getClient();
        $this->logger = $logger;
    }

    public function retrieveEntities() : array
    {
        $elements = $this->retrieve();
        $dotaPlayers = [];


        if (0 !== count($elements)) {
            $config = new AutoMapperConfig();
            $config
                ->registerMapping(stdClass::class, DotaProPlayer::class)
                ->forMember('twitter', static function ($element) {
                    if (!isset($element->twitterLink)) {
                        return '';
                    }

                    return $element->twitterLink;
                })
                ->forMember('twitch', static function ($element) {
                    if (!isset($element->twitchLink)) {
                        return '';
                    }

                    return $element->twitchLink;
                })
                ->forMember('instagram', static function ($element) {
                    if (!isset($element->instagramLink)) {
                        return '';
                    }

                    return $element->instagramLink;
                })
                ->forMember('youtube', static function ($element) {
                    if (!isset($element->youtubeLink)) {
                        return '';
                    }

                    return $element->youtubeLink;
                })
                ->forMember('weibo', static function ($element) {
                    if (!isset($element->weiboLink)) {
                        return '';
                    }

                    return $element->weiboLink;
                })
                ->forMember('facebook', static function ($element) {
                    if (!isset($element->facebookLink)) {
                        return '';
                    }

                    return $element->facebookLink;
                })
                ->forMember('isMarkedPro', static function () {
                    return true;
                })
                ->forMember('isTiWinner', static function ($element) {
                    if (!isset($element->isTIWinner)) {
                        return false;
                    }

                    return $element->isTIWinner;
                });

            $mapper = new AutoMapper($config);

            foreach ($elements as $element) {
                $dotaPlayers[] = $mapper->map($element, DotaProPlayer::class);
            }
        }

        return $dotaPlayers;
    }

    private function retrieve() : array
    {
        try {
            $response = $this->client->get('/api/v1/Player/proSteamAccount');
        } catch (ClientException $exception) {
            $this->logger->error(
                'Could not retrieve pro players, got request error ' . $exception->getMessage()
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
            foreach ($data as $key => $value) {
                $return[] = $value;
            }

            return $return;
        } catch (\Exception $e) {
            $this->logger->error(
                'Can not deserialize data response from pro-steam-account API code: ' . $e->getMessage()
            );
        }

        return [];
    }
}