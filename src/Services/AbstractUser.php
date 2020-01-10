<?php

namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

abstract class AbstractUser
{
    /** @var UserPasswordEncoderInterface */
    protected $encoder;

    /** @var UserRepository */
    protected $repository;

    /**
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        UserRepository $userRepository
    ) {
        $this->encoder = $passwordEncoder;
        $this->repository = $userRepository;
    }

    /**
     * @param User $user
     * @param string $password
     * @return string
     */
    final public function encodePassword(User $user, string $password): string
    {
        return $this->encoder->encodePassword(
            $user,
            $password
        );
    }
}
