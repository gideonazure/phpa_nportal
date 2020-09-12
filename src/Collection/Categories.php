<?php

declare(strict_types=1);

namespace App\Collection;

use App\ViewModel\Category;

final class Categories implements \IteratorAggregate
{
    private array $categories;

    public function __construct(Category ...$categories)
    {
        $this->categories = $categories;
    }


    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }

}
