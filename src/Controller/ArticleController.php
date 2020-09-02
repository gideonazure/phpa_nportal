<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ArticlePageDataProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ArticleController extends AbstractController
{
    private ArticlePageDataProviderInterface $articleProvider;

    public function __construct(ArticlePageDataProviderInterface $articleProvider)
    {
        $this->articleProvider = $articleProvider;
    }

    /**
     * @Route("/article/{id}", methods={"GET"}, name="app_article")
     * @param int $id
     * @return Response
     */
    public function index(int $id): Response
    {
        $article = $this->articleProvider->getItem($id);

        return $this->render('article/index.html.twig', [
            'article' => $article
        ]);
    }
}
