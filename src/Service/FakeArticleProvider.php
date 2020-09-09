<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\ArticleNotFoundException;
use App\ViewModel\ArticlePage;
use Faker\Factory;
use Faker\Generator;

final class FakeArticleProvider implements ArticleProviderInterface
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

    public function getById(int $id): ArticlePage
    {
        return $this->createArticle($id);
    }

    /**
     *The method implements the creation of an instance of ArticlePageDataItem using the Faker library.
     *
     * @param int $id Specifies the id of the entry when instantiating
     *
     * @return ArticlePage Instance of article DTO
     *
     * @throws ArticleNotFoundException
     */
    private function createArticle(int $id): ArticlePage
    {
        $this->checkArticleExists($id);

        $title = $this->faker->words(
            $this->faker->numberBetween(1, 4),
            true
        );
        $title = \ucfirst($title);

        return new ArticlePage(
            $id,
            $this->faker->randomElement(self::CATEGORIES),
            $title,
            $this->faker->realText(2300, 2),
            \DateTimeImmutable::createFromMutable($this->faker->dateTimeThisYear)
        );
    }

    private function checkArticleExists(int $id)
    {
        if ($id > 50) {
            throw new ArticleNotFoundException('Sorry, this article no longer exists or did not exist at all');
        }
    }
}
