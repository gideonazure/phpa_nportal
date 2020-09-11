<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\CategoryPageArticles;
use App\Entity\Article;
use App\Repository\ArticleRepository;

final class CategoryPageArticlesProvider implements CategoryPageArticlesProviderInterface
{

    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getList(): CategoryPageArticles
    {
        $articles = $this->articleRepository->getLatestPublished();
        $viewModels = \array_map(fn (Article $article) => $article->getHomePageArticle(), $articles);

        return new CategoryPageArticles(...$viewModels);
    }

}
