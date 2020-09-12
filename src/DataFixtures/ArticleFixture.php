<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class ArticleFixture extends AbstractFixture
{
    private const ARTICLES_COUNT = 35;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::ARTICLES_COUNT; ++$i) {
            $article = $this->createArticle();

            if($this->faker->boolean(80)){
                $article->publish();
            }

            $manager->persist($article);
        }

        $manager->flush();
    }

    private function createArticle(): Article
    {
        $article = new Article($this->generateTitle());

        return $article
            ->addImage($this->faker->imageUrl())
            ->addCategory($this->faker->numberBetween(46, 50))
            ->addShortDescription($this->generateShortDescription())
            ->addBody($this->generateBody());
    }

    private function generateTitle()
    {
        $title = $this->faker->words(
            $this->faker->numberBetween(1, 4),
            true
        );

        return \ucfirst($title);
    }

    private function generateShortDescription()
    {
        return \ucfirst($this->faker->realText(130, 2));
    }

    private function generateBody()
    {
        return \ucfirst($this->faker->realText(2300, 2));
    }
}
