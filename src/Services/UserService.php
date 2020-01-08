<?php

namespace App\Services;

use App\Entity\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserService extends AbstractUser
{
    /**
     * @return array
     */
    final public function getUsers(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param string $user
     * @return User
     */
    final public function signin(string $user): User
    {
        $user = $this->buildUser($user);
        $this->repository->insert($user);

        return $user;
    }

    /**
     * @param string $userJson
     * @return User
     */
    final public function buildUser(string $userJson): User
    {
        $userData = json_decode($userJson, false);
        $user = new User();

        $user->setEmail($userData->email)
            ->setPassword($this->encodePassword($user, $userData->password));

        return $user;
    }
}
