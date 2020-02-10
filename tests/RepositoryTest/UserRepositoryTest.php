<?php

namespace App\Tests\RepositoryTest;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\UserService;
use App\Tests\Advanced\AdvancedTestCase;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class UserRepositoryTest extends AdvancedTestCase
{
    /** @var EntityManager */
    private $entityManager;

    /** @var UserRepository */
    private $userRepository;

    public function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->userRepository = $this->entityManager
            ->getRepository(User::class)
        ;
    }
    
//    /**
//     * @group UserRepository
//     * @group Repository
//     *
//     * @throws NonUniqueResultException
//     */
//    public function testFindUsername()
//    {
//        $users = $this->userRepository->findAll();
//        $userTest = null;
//        
//        foreach ($users as $user) {
//            $userTest = $this->userRepository->loadUserByUsername($user['username']);
//            break;
//        }
//        
//        $this->assertIsInt($userTest->getId());
//    }

    /**
     * @group UserRepository
     * @group Repository
     *
     * @throws NonUniqueResultException
     */
    public function testFindEmail()
    {
        $users = $this->userRepository->findAll();
        $userTest = null;

        foreach ($users as $user) {
            $userTest = $this->userRepository->loadUserByUsername($user['email']);
            break;
        }

        $this->assertIsInt($userTest->getId());
    }

    /**
     * @group UserRepository
     * @group Repository
     */
    public function testUpgradePassword()
    {
        $user = $this->userRepository->loadUserByUsername('admin');

        $this->userRepository->upgradePassword($user, 'aushdasd');

        $this->assertIsInt($user->getId());
    }
}