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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * Shows the home page.
     *
     * @param EntityManagerInterface $entityManager
     * @return Response
     *
     * @Route("/", name="app_homepage")
     */
    public function homepage(EntityManagerInterface $entityManager) //can get repository directly e.g. ArticleRepository $repository
    {

        $repository = $entityManager->getRepository(Article::class);

        $articles = $repository->findAllPublishedByNewest();

        return $this->render('app/home.html.twig', [
            'title' => 'The Spacebar',
            'subtitle' => 'The best place not on earth.',
            'articles' => $articles
        ]);
    }

    /**
     * Shows an article.
     *
     * Using shortcut with router wildcard shenanigans. Have to have a wildcard that matches property on entity class.
     *
     * @param Article $article
     * @return Response
     *
     * @Route("/news/{slug}", name="article_show")
     */
    public function show(Article $article): Response //EntityManagerInterface $entityManager
    {

        /* $repository = $entityManager->getRepository(Article::class);

          @var Article $article
         $article = $repository->findOneBy(['slug' => $slug]);

         if (!$article) {
             throw $this->createNotFoundException('No Article found for ' . $slug);
         }
         */

        return $this->render('article/article.html.twig', [
            'title' => 'Articles',
            'article' => $article,
            'comments' => [
                'comment1', 'comment2', 'comment3'
            ]
        ]);
    }

    /**
     *
     *
     * @Route("/news/{slug}/heart", name="update_article_heart", methods={"GET"})
     * @param Article $article
     * @return JsonResponse
     */
    public function updateArticleHeart(Article $article): JsonResponse
    {
        $updatedArticleCount = $article->getHeartCount() + 1;

        return new JsonResponse(['heart' => $updatedArticleCount]);
    }
}