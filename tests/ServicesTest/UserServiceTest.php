<?php

namespace App\Tests\ServicesTest;

use App\Entity\User;
use App\Services\UserService;
use Doctrine\ORM\EntityManager;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class UserServiceTest extends KernelTestCase
{
    /** @var EntityManager */
    private $entityManager;
    
    /** @var UserRepository */
    private $userRepository;
    
    /** @var UserService */
    private $userService;
    
    public function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->userRepository = $this->entityManager
            ->getRepository(User::class)
        ;

        $encoder = [];
        $encoder['App\Entity\User'] = $this->getEncodersArray();

        $encoderFactory = new EncoderFactory($encoder);
        $userPasswordEncoderInterface = new UserPasswordEncoder($encoderFactory);

        $this->userService = new UserService(
            $userPasswordEncoderInterface,
            $this->userRepository
        );
    }

    /**
     * @dataProvider userProviders
     *
     * @group UserService
     * @group Services
     */
    public function testSignin(string $name, string $username, string $email, string $password)
    {
        $user = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password
        ];

        $user = $this->userService->signin(json_encode($user));

        $this->assertIsInt($user->getId());
    }

    /**
     * @group UserService
     * @group Services
     */
    public function testGetUsers()
    {
        $users = $this->userService->getUsers();
        
        $this->assertIsArray($users);
    }

    /**
     * @return array
     */
    public function userProviders(): array
    {
        return [
            "User 1" => ["Foo Bar", 'foobar', 'baarfoor@gmail.com', 'as54c1a'],
            "User 2" => ["Bar Foo", 'barfoo', 'foorbar@gmail.com', '35c8as4c'],
        ];
    }
    
    /**
     *@return array
     */
    private function getEncodersArray(): array
    {
        return [
            "algorithm" => "auto",
            "migrate_from" => [],
            "hash_algorithm" => "sha512",
            "key_length" => 40,
            "ignore_case" => false,
            "encode_as_base64" => true,
            "iterations" => 5000,
            "cost" => null,
            "memory_cost" => null,
            "time_cost" => null
        ];
    }
}