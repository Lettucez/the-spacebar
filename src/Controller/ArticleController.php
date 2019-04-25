<?php
/**
 * Created by PhpStorm.
 * User: christopherleo
 * Date: 2019-02-06
 * Time: 17:27
 */

namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * Shows the home page.
     *
     * @return Response
     *
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('app/home.html.twig', [
            'title' => 'Home',
            'subtitle' => 'pretty baller'
        ]);
    }

    /**
     * Shows an article.
     *
     * @param EntityManagerInterface $entityManager
     * @param $slug
     * @return Response
     *
     * @Route("/news/{slug}", name="article_show")
     */
    public function show(EntityManagerInterface $entityManager, $slug): Response
    {

        $repository = $entityManager->getRepository(Article::class);

        /** @var Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);
        if (!$article) {
            throw $this->createNotFoundException('No Article found for ' . $slug);
        }

        return $this->render('article/article.html.twig', [
            'article' => $article,
            'comments' => [
                'comment1', 'comment2', 'comment3'
            ]
        ]);
    }
}