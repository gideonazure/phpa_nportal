<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CategoryPageArticlesProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CategoryController extends AbstractController
{
    private CategoryPageArticlesProviderInterface $articlesProvider;

    public function __construct(CategoryPageArticlesProviderInterface $articlesProvider)
    {
        $this->articlesProvider = $articlesProvider;
    }

    /**
     * @Route("/", methods={"GET"}, name="app_home")
     */
    public function index(): Response
    {
        $articles = $this->articlesProvider->getList();

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
