<?php

declare(strict_types=1);

namespace App\Collection;

use App\ViewModel\CategoryPageArticle;

final class CategoryPageArticles implements \IteratorAggregate
{
    private array $categoryPageArticles;

    public function __construct(CategoryPageArticle ...$categoryPageArticles)
    {
        $this->categoryPageArticles = $categoryPageArticles;
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categoryPageArticles);
    }
}
