<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class CategoryFixture extends AbstractFixture
{
    private const CATEGORIES = [
        'Sport',
        'IT',
        'Science',
        'Music',
        'Art'
    ];

    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < count(self::CATEGORIES); ++$i) {
            $category = $this->createCategory(self::CATEGORIES[$i]);
            $category->check();
            $manager->persist($category);
        }

        $manager->flush();
    }

    private function createCategory($name): Category
    {
        return new Category($name);
    }

}
