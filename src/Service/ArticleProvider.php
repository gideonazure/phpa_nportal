<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\ArticleRepository;
use App\ViewModel\ArticlePage;

final class ArticleProvider implements ArticleProviderInterface
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getById(int $id): ArticlePage
    {
        $article = $this->articleRepository->getOneById($id);

        return $article->getArticlePageContent();
    }
}
