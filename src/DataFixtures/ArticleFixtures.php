<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Article;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <=5; $i++){
            $article= new Article();
            $article->setTitle("Titre de l'article N°$i")
                    ->setContent("<p>Contenu de l'article N°$i</p>")
                    ->setImage("http://placehold.it/150x50")
                    ->setCreatedAt(new \DateTime());

            $manager->persist($article);
        }
        $manager->flush();
    }
}
