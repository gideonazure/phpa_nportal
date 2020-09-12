<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ArticleProviderInterface;
use App\Service\CategoryPageArticlesProviderInterface;
use App\Service\CategoryProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CategoryController extends AbstractController
{
    private CategoryPageArticlesProviderInterface $categoryPageArticlesProvider;
    private CategoryProviderInterface $categoryProvider;
    private ArticleProviderInterface $articleProvider;

    public function __construct(
        CategoryPageArticlesProviderInterface $categoryPageArticlesProvider,
        CategoryProviderInterface $categoryProvider,
        ArticleProviderInterface $articleProvider
    )
    {
        $this->categoryPageArticlesProvider = $categoryPageArticlesProvider;
        $this->categoryProvider = $categoryProvider;
        $this->articleProvider = $articleProvider;
    }

    /**
     * @Route("/{slug}", methods={"GET"}, name="app_category")
     */
    public function index(string $slug): Response
    {
        $category = $this->categoryProvider->getBySlug($slug);
        dd($category->getArticles());

        return $this->render('category/index.html.twig', [
            'articles' => $category->getName(),
        ]);
    }
}
