<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET","POST"})
     * @return Response
     */
    public function home(): Response
    {
        return $this->json(
            ["message" => "You are success authenticated!"],
            Response::HTTP_OK
        );
    }
    
    /**
     * @return Response
     * @Route("/login", name="app_login", methods={"GET", "POST"})
     */
    public function relocated(): Response
    {
        return $this->json(
            ['message' => 'You are note logged, please authenticate yourself!'],
            Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED
        );
    }
}
