<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CategoryProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BaseController extends AbstractController
{
    private CategoryProviderInterface $categoriesProvider;

    public function __construct(CategoryProviderInterface $categoriesProvider)
    {
        $this->categoriesProvider = $categoriesProvider;
    }


    public function categoriesList(): Response
    {
        $categories = $this->categoriesProvider->getList();

        return $this->render('category/list.html.twig', [
            'categories' => $categories
        ]);
    }
}
