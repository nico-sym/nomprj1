<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Category;
use app\Entity\Article;
use app\Entity\Comment;
use Faker\Factory;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {  
        //$faker = Faker\Factory::create('fr_FR');
        //Utilisation de faker
		$faker = Factory::create('fr_FR');

        // 3 categories
        for($i = 1; $i <=3; $i++){
            $category= new Category();
            $category->setTitle($faker->sentence())
                     ->setDescription($faker->paragraph());

            $manager->persist($category);

            // 4,5 articles
            for($j = 1; $j <= mt_rand(4,5); $j++){

                $article= new Article();
                $content='<p>'. join($faker->paragraphs(3)) . '</p>';

                $article->setTitle($faker->sentence())
                        ->setContent($content)
                        ->setImage($faker->imageUrl())
                        ->setCreatedAt($faker->DateTimeBetween('-5 months'))
                        ->setCategory($category);

                $manager->persist($article);

                // 3,5 commentaires à l'article
                for($k = 1; $k <= mt_rand(3,5); $k++){

                    $comment= new Comment();
                    $content='<p>'. join($faker->paragraphs(2)) . '</p>';
                    $days= (new \DateTime())->diff($article->getCreatedAt())->days;

                    $comment->setAuthor($faker->name)
                            ->setContent($content)
                            ->setCreatedAt($faker->DateTimeBetween('-'. $days. 'days'))
                            ->setArticle($article);
    
                    $manager->persist($comment);
                }
    
            }
        }
        $manager->flush();
    }
}
