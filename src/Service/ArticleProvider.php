<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\CategoryPageArticles;
use App\Entity\Article;
use App\Exception\ArticleNotFoundException;
use App\Repository\ArticleRepository;
use App\ViewModel\ArticlePage;

final class ArticleProvider implements ArticleProviderInterface
{
    /**
     * @var ArticleRepository
     */
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
