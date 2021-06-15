<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */

    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('accueil/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("accueil/{id}", name="article_show")
     */

    public function show(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        return $this->render('accueil/show.html.twig', [
           'article' => $entityManager->getRepository(Article::class)->find($id),
        ]);
    }
}