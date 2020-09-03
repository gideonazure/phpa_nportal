<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\FakeArticlePage;

/**
 * Interface describes the getItem method for getting one record by id.
 */
interface FakeArticleProviderInterface
{
    public function getById(int $id): FakeArticlePage;
}
