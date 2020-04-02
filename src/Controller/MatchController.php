<?php

namespace App\Controller;

use App\Message\DotaMatchMessage;
use App\Message\DotaMatchMessageList;
use App\Message\PublicDotaMatchMessage;
use App\Service\Api\PublicMatchesApiService;
use App\Service\ConfigurationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    /**
     * @Route("/match/public", name="match")
     * @param Request $request
     * @param PublicMatchesApiService $publicMatchesApiService
     * @param MessageBusInterface $bus
     * @param ConfigurationService $configurationService
     * @return  JsonResponse
     */
    public function index(
        Request $request,
        PublicMatchesApiService $publicMatchesApiService,
        MessageBusInterface $bus,
        ConfigurationService $configurationService
    ) : JsonResponse
    {
        $startingMMr = $request->get('mmr', 6000);
        $configuration = $configurationService->getConfigValue('dota.progames.last');
        $matches = $publicMatchesApiService->retrieveMatchIdentifiers($configuration->getValue(), $startingMMr);
        $newId = end($matches);

        /**
         * Group messages in chunks of 5 and send them to the
         * async processing queue.
         */
        $messageChunks = array_chunk($matches, 5);

        foreach ($messageChunks as $messageChunk) {
            $bus->dispatch(DotaMatchMessageList::create($messageChunk));
        }

        $configuration->setValue($newId);
        $configurationService->updateConfigurationValue($configuration);

        return new JsonResponse(['matches' => count($matches)], 201);
    }
}
