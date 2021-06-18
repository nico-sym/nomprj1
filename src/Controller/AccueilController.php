<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("accueil/new", name="article_create")
     * @Route("accueil/{id}/edit", name="article_edit")
     */

    public function create(Article $article = null, Request $request, ObjectManager $objectManager): Response
    {
        // Si création
        if (!$article) {
            $article = new Article();
        }

        // Si pas fait avec php bin/console make:form
        // J'ai tager les lignes du dessous
        //$form = $this->createFormBuilder($article)
        //    ->add('title')
        //    ->add('content')
        //    ->add('image')
        //    ->getForm();

        // Si dans src/form avec php bin/console make:form
        $form = $this->createForm(ArticleType::class , $article);

        $form->handleRequest($request);

        if (($form->isSubmitted()) and ($form->isValid())) {
            // Si création
            if (!$article->getId()) {
                $article->setCreatedAt(new \DateTime());
            }

            $objectManager->persist($article);
            $objectManager->flush();

            return $this->redirectToRoute('article_show', ['id' => $article->getId()]);
        }

        return $this->render('accueil/create.html.twig', [
            'formArticle' => $form->createView(),
            // Si modification editMod à true
            'editMod' => $article->getId() !== null
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