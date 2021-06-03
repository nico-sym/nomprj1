<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $roles[] = 'ROLE_USER';

        //Utilisation de faker
		//$faker = Factory::create('fr_FR');
        
		// Création d'un utilisateur
		$user= new User();
		
		$user->setEmail('user@test.com')
             ->setRoles($roles);
        		
		$password = $this->encoder->encodePassword($user, 'password');
		$user->setPassword($password);
		
		$manager->persist($user);
        $manager->flush();
    }
}
