<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @package App\Controller
 * @Route("/authentication", name="authentication")
 */
class SecurityController extends AbstractController
{
    /**
     * @return Response
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(): Response
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/re-login", name="/remember_not", methods={"GET"})
     * @return Response
     */
    public function reLogin(): Response
    {
        return $this->redirectToRoute('home');
    }
}
