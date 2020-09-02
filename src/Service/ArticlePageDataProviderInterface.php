<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\ArticlePageDataItem;

interface ArticlePageDataProviderInterface
{
    public function getItem(int $id): ArticlePageDataItem;
}
