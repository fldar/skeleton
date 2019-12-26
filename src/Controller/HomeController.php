<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/home")
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
            ["message" => "You are not logged!"],
            Response::HTTP_FORBIDDEN
        );
    }
}
