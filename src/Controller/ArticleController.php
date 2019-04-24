<?php
/**
 * Created by PhpStorm.
 * User: christopherleo
 * Date: 2019-02-06
 * Time: 17:27
 */

namespace App\Controller;


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
     * @param string $article Contains the url text after /news/.
     *
     * @return Response
     *
     * @Route("/news/{article}", name="article_show")
     */
    public function show(EntityManagerInterface $entityManager, $article): Response
    {

        $repository = $entityManager->getRepository('article');

        return $this->render('article/article.html.twig', [
            'title' => str_replace('-', ' ', $article),
            'subtitle' => 'this is the subtitle',
            'comments' => [
                'comment1', 'comment2', 'comment3'
            ]
        ]);
    }
}