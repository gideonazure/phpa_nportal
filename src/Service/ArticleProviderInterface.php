<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\ArticlePage;

/**
 * Interface describes the getItem method for getting one record by id.
 */
interface ArticleProviderInterface
{
    public function getById(int $id): ArticlePage;
}
