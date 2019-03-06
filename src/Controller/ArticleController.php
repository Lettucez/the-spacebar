<?php
/**
 * Created by PhpStorm.
 * User: christopherleo
 * Date: 2019-02-06
 * Time: 17:27
 */

namespace App\Controller;


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
     * @Route("/")
     */
    public function homepage()
    {
        return new Response("Hello Bros");
    }

    /**
     * Shows an article.
     *
     * @param string $article Contains the url text after /news/.
     *
     * @return Response
     *
     * @Route("/news/{article}")
     */
    public function show($article)
    {
        return $this->render('article/show.html.twig', [
            'title' => $article,
            'subtitle' => 'this is the subtitle',
            'comments' => [
                'comment1', 'comment2', 'comment3'
            ]
        ]);
    }
}