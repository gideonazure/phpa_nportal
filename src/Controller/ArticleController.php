<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\FakeArticleProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

final class ArticleController extends AbstractController
{
    private FakeArticleProviderInterface $articleProvider;

    public function __construct(FakeArticleProviderInterface $articleProvider)
    {
        $this->articleProvider = $articleProvider;
    }

    /**
     * @Route("/article/{id}", methods={"GET"}, name="app_article")
     */
    public function show(int $id): Response
    {
        $error = null;

        try{
            $article = $this->articleProvider->getById($id);

            return $this->render('article/show.html.twig', [
                'article' => $article
            ]);
        }catch (\NotFoundHttpException $e){
            $e->getMessage();
        }

    }
}
