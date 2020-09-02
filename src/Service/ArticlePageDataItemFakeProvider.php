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


    /**
     * The method describes the functionality for get one article
     *
     * @param int $id Id of the article to get
     * @return ArticlePageDataItem Instance of article DTO
     */
    public function getItem(int $id): ArticlePageDataItem
    {
        return $this->createArticle($id);
    }


    /**
     *The method implements the creation of an instance of ArticlePageDataItem using the Faker library
     *
     * @param int $id Specifies the id of the entry when instantiating
     * @return ArticlePageDataItem Instance of article DTO
     */
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
            $this->faker->realText(2300, 2),
            \DateTimeImmutable::createFromMutable($this->faker->dateTimeThisYear)
        );
    }

}
