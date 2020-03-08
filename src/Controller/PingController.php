<?php

namespace App\Controller;

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
}
