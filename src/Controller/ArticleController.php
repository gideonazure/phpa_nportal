<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ArticleProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

final class ArticleController extends AbstractController
{
    private ArticleProviderInterface $articleProvider;

    public function __construct(ArticleProviderInterface $articleProvider)
    {
        $this->articleProvider = $articleProvider;
    }

    /**
     * @Route("/article/{id}", methods={"GET"}, name="app_article")
     */
    public function show(int $id): Response
    {
        try {
            $article = $this->articleProvider->getById($id);
        } catch (\ArticleNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
