<?php

declare(strict_types=1);

namespace App\Collection;

use App\ViewModel\CategoryPageArticle;

final class CategoryPageArticles implements \IteratorAggregate
{
    private array $articles;

    public function __construct(CategoryPageArticle ...$articles)
    {
        $this->articles = $articles;
    }

    public function getLates(int $count): self
    {
        $lates = [];

        for ($i = 0; $i < $count; ++$i) {
            $article = \array_shift($this->articles);

            if (null === $article) {
                break;
            }

            $lates[] = $article;
        }

        return new self(...$lates);
    }

    public function getOneLates(): ?CategoryPageArticle
    {
        return \array_shift($this->articles);
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->articles);
    }
}
