<?php
/**
 * Created by PhpStorm.
 * User: christopherleo
 * Date: 2019-02-06
 * Time: 17:27
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController
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
}