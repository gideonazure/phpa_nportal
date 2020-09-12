<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\CategoryPageArticles;

interface CategoryPageArticlesProviderInterface
{
    public function getList(int $category): CategoryPageArticles;
}
