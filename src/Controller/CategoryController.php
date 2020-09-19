<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CategoryProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CategoryController extends AbstractController
{
    private CategoryProviderInterface $categoryProvider;

    public function __construct(CategoryProviderInterface $categoryProvider)
    {
        $this->categoryProvider = $categoryProvider;
    }

    /**
     * @Route("/{slug}", methods={"GET"}, name="app_category")
     */
    public function index(string $slug): Response
    {
        $category = $this->categoryProvider->getBySlug($slug);

        return $this->render('category/index.html.twig', [
            'articles' => $category->getArticles(),
            'category' => $category->getName(),
        ]);
    }
}
