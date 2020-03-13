<?php

namespace App\Controller;

use App\Service\Api\ProPlayerApiService;
use App\Service\Api\PublicMatchesApiService;
use App\Service\Data\DotaProPlayerDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProPlayerController
 * @package App\Controller
 * @codeCoverageIgnore
 */
class ProPlayerController extends AbstractController
{
    /**
     * @Route("/player/pro", name="pro_player")
     * @param ProPlayerApiService $apiService
     * @param DotaProPlayerDataService $dotaPlayerDataService
     * @return JsonResponse
     */
    public function index(ProPlayerApiService $apiService, DotaProPlayerDataService $dotaPlayerDataService) : JsonResponse
    {
        $dotaPlayerDataService->updateProfessionalPlayers(
            $apiService->retrieveEntities()
        );

        return new JsonResponse(
            null,
            Response::HTTP_NO_CONTENT
        );
    }


    /**
     * @Route("/test", name="pro_player")
     * @param PublicMatchesApiService $publicMatchesApiService
     */
    public function test(PublicMatchesApiService $publicMatchesApiService)
    {

        $matches = $publicMatchesApiService->retrieveMatchIdentifiers(5283233518);

        var_dump($matches);
        die();
    }
}
