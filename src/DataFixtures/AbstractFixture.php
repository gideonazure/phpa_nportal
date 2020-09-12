<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Service\CategoryProviderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Faker\Generator;

abstract class AbstractFixture extends Fixture
{
    protected Generator $faker;
    protected CategoryProviderInterface $categoryProvider;

    public function __construct(CategoryProviderInterface $categoryProvider)
    {
        $this->faker = Factory::create();
        $this->categoryProvider = $categoryProvider;
    }
}
