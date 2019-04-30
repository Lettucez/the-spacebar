<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{

    /**
     * Generates articles for display.
     *
     * @Route("/admin/article/new")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function new(EntityManagerInterface $entityManager) : Response
    {
        $article = new Article();

        try {
            $article->setTitle("Ballers and Stallers")->setSlug('ballers-and-stallers-' . rand(100, 999))->setContent('Ballers are all of the rage now....')->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 50))));

            $article->setAuthor('Jim Johnson');

            $article->setHeartCount(rand(5,100));

            $article->setImageFilename('https://bulma.io/images/placeholders/640x480.png');

        } catch (\Exception $exception) {
            $exception->getMessage();
        }

        $entityManager->persist($article);
        $entityManager->flush();


        return new Response(sprintf("Creating article with id: #%d <br>title: %s <br>slug: %s <br>Published on: %s", $article->getId(), $article->getTitle(), $article->getSlug(), $article->getPublishedAt()->format('m-d-Y')));

    }
}