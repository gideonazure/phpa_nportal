<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\ArticlePageDataItem;
use Faker\Factory;
use Faker\Generator;

final class ArticlePageDataItemFakeProvider implements ArticlePageDataProviderInterface
{
    private const CATEGORIES = [
        'World',
        'Sport',
        'IT',
        'Science',
    ];

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }


    public function getItem(int $id): ArticlePageDataItem
    {
        return $this->createArticle($id);
    }

    private function createArticle(int $id): ArticlePageDataItem
    {
        $title = $this->faker->words(
            $this->faker->numberBetween(1, 4),
            true
        );
        $title = \ucfirst($title);

        return new ArticlePageDataItem(
            $id,
            $this->faker->randomElement(self::CATEGORIES),
            $title,
            $this->faker->realText(400, 2),
            \DateTimeImmutable::createFromMutable($this->faker->dateTimeThisYear)
        );
    }

}
