<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\ArticlePageDataItem;

/**
 * Interface describes the getItem method for getting one record by id.
 */
interface ArticlePageDataProviderInterface
{
    public function getItem(int $id): ArticlePageDataItem;
}
