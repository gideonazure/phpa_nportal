<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\FakeArticlePage;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class FakeArticleProvider implements FakeArticleProviderInterface
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

    public function getById(int $id): FakeArticlePage
    {
        return $this->createArticle($id);
    }

    /**
     *The method implements the creation of an instance of ArticlePageDataItem using the Faker library.
     *
     * @param int $id Specifies the id of the entry when instantiating
     *
     * @return FakeArticlePage Instance of article DTO
     */
    private function createArticle(int $id): FakeArticlePage
    {

        if($id > 50){
            throw new NotFoundHttpException('Sorry, this article no longer exists or did not exist at all');
        }


        $title = $this->faker->words(
            $this->faker->numberBetween(1, 4),
            true
        );
        $title = \ucfirst($title);

        return new FakeArticlePage(
            $id,
            $this->faker->randomElement(self::CATEGORIES),
            $title,
            $this->faker->realText(2300, 2),
            \DateTimeImmutable::createFromMutable($this->faker->dateTimeThisYear)
        );
    }
}
