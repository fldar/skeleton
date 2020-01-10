<?php

namespace App\Controller;

use App\Services\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/user")
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /** @var UserService */
    private $service;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @Route("/signin", name="/register_user", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    final public function signin(Request $request): Response
    {
        $user = $this->service->signin($request->getContent());

        return $this->json(["message" => "User successfully registered with email {$user->getEmail()}!"]);
    }

    /**
     * @Route("/list", name="/users_list", methods={"GET"})
     * @return Response
     */
    final public function users(): Response
    {
        return $this->json([
            'users' => $this->service->getUsers()
        ]);
    }
}
