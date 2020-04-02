<?php

namespace App\Controller;

use App\Repository\Graph\MatchGraphRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PingController
 * @package App\Controller
 * @codeCoverageIgnore
 */
class PingController extends AbstractController
{
    /**
     * @Route("/ping", name="ping")
     */
    public function index() : JsonResponse
    {

        return $this->json([
            'message' => 'ok'
        ]);
    }

    /**
     * @Route("/test", name="ping")
     */
    public function test(MatchGraphRepository $matchGraphRepository) : void
    {

        $matchGraphRepository->getMatchQuery();
    }
}
