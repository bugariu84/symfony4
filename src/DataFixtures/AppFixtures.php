<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 13.02.2018
 * Time: 00:00
 */

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Load users
        $this->loadUsers($manager);
    }

    private function loadUsers(ObjectManager $manager): void
    {
        foreach ($this->getUsersData() as [$username, $password, $email, $apiKey, $roles]) {
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setApiKey($apiKey);
            $user->setRoles($roles);

            $manager->persist($user);
            $this->addReference($username, $user);
        }

        $manager->flush();
    }

    private function getUsersData() : array
    {
        return [
            // [username, password, email, api_key, roles]
            ['user', '123', 'user@email.com', md5('user+user_password+user@email.com'), ['ROLE_USER']],
            ['admin', '123', 'admin@email.com', md5('admin+admin_password+user@email.com'), ['ROLE_ADMIN']],
            ['api_user', '123', 'api-user@email.com', md5('api_user+api_user_password+user@email.com'), ['ROLE_API_USER']],
        ];
    }
}