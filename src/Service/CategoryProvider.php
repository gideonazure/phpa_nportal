<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\Categories;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\ViewModel\Category as CategoryView;

final class CategoryProvider implements CategoryProviderInterface
{

    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getList(): Categories
    {
        $categories = $this->categoryRepository->getList();
        $viewModels = \array_map(fn (Category $category) => $category->getCategory(), $categories);

        return new Categories(...$viewModels);
    }

    public function getBySlug(string $slug): CategoryView
    {
        $category = $this->categoryRepository->getBySlug($slug);
        return $category->getCategory();
    }

    public function getById(int $id): CategoryView
    {
        $category = $this->categoryRepository->getById($id);
        return $category->getCategory();
    }


    public function getCount(): int
    {
        return $this->categoryRepository->getCount();
    }
}
