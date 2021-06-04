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
		$faker = Factory::create('fr_FR');
        
        for ($i = 0; $i < 3; $i++) {
            // Création d'un utilisateur
            $user= new User();
            
            $user->setEmail('user'.$i.'@test.com')
                ->setName('user'.$i)
                ->setSlug('user'.$i.'slug')
                ->setCreatedAt($faker->dateTime('now'))
                ->setRoles($roles);

                    
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            
            $manager->persist($user);
            $manager->flush();
        }
    }
}
