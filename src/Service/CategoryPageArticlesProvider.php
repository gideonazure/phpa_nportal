<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\CategoryPageArticles;
use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;

final class CategoryPageArticlesProvider implements CategoryPageArticlesProviderInterface
{

    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;
    private CategoryRepository $categoryRepository;


    public function __construct(
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getList(int $category): CategoryPageArticles
    {
        $category = $this->categoryRepository->getById($category);
        $articles = $category->getArticles();

//        dd($articles);

//        $viewModels = \array_map(fn (Article $article) => $article->getHomePageArticle(), $articles);
//        return new CategoryPageArticles(...$viewModels);
    }

}
