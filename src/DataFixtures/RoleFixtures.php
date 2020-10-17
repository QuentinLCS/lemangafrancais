<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $role = new Role();
            $role->setId($faker->unique()->numberBetween(2,999))
                ->setRolNom($faker->unique()->name)
                ->setRolDescription($faker->text)
                ->setRolCouleur(substr($faker->hexColor, 1) );
            $manager->persist($role);
        }
        $manager->flush();
    }
}
