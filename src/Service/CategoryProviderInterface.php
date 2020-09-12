<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\Categories;
use App\ViewModel\Category;

interface CategoryProviderInterface
{
    public function getList(): Categories;

    public function getBySlug(string $slug): Category;

    public function getById(int $id): Category;

    public function getCount(): int;
}
