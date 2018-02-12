<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 13.02.2018
 * Time: 00:00
 */

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Create 3 users: role_user, role_admin and a role_api_user
    }
}