<?php

declare(strict_types=1);

namespace App\Service;

/**
 * Interface describes the getItem method for getting one record by id.
 */
interface ArticleProviderInterface
{
    public function getById(int $id): object;
}
