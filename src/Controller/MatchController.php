<?php

namespace App\Controller;

use App\Message\DotaMatchMessage;
use App\Service\Api\PublicMatchesApiService;
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
     * @return  JsonResponse
     */
    public function index(
        Request $request, PublicMatchesApiService $publicMatchesApiService, MessageBusInterface $bus
    ) : JsonResponse
    {
        $startingMMr = $request->get('mmr', 6000);
        $matches = $publicMatchesApiService->retrieveMatchIdentifiers(5283233518, $startingMMr);

        foreach ($matches as $match) {
            $bus->dispatch(DotaMatchMessage::create($match));
        }

        return new JsonResponse(['matches' => count($matches)], 201);
    }
}
