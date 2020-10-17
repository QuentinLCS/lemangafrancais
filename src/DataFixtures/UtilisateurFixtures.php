<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {

        $this->encoder = $encoder;
    }

    /* // Un seul utilisateur
    public function load(ObjectManager $manager)
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setUtiMail('quentin@quentin.fr')
                    ->setId('test3')
                    ->setUtiMdp($this->encoder->encodePassword($utilisateur, 'TgwP/Bduk(2[\cO*@G/wm6tLPfWN4$c*5Zd&vx$C3tdZ~cR_}i'));
        $manager->persist($utilisateur);
        $manager->flush();
    }
    */

    // 50 Utilisateurs
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setUtiMail($faker->email)
            ->setId($faker->unique()->userName)
            ->setUtiMdp($this->encoder->encodePassword($utilisateur, $faker->password()));
            $manager->persist($utilisateur);
        }
        $manager->flush();
    }
}
