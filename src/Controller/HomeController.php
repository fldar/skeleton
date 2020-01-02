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
//        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'You are not logged!');
        
        return $this->json(
            ["message" => "Nice!"],
            Response::HTTP_OK
        );
    }
}
