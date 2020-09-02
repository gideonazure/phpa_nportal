<?php

declare(strict_types=1);

namespace App\ViewModel;

final class ArticlePageDataItem
{
    private int $id;
    private string $categoryTitle;
    private string $articleTitle;
    private string $articleText;
    private \DateTimeImmutable $publicationDate;


    public function __construct(
        int $id,
        string $categoryTitle,
        string $articleTitle,
        string $articleText,
        \DateTimeImmutable $publicationDate
    ) {
        $this->id = $id;
        $this->categoryTitle = $categoryTitle;
        $this->articleTitle = $articleTitle;
        $this->articleText = $articleText;
        $this->publicationDate = $publicationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategoryTitle(): string
    {
        return $this->categoryTitle;
    }

    public function getArticleTitle(): string
    {
        return $this->articleTitle;
    }


    public function getArticleText(): string
    {
        return $this->articleText;
    }

    public function getPublicationDate(): \DateTimeImmutable
    {
        return $this->publicationDate;
    }
}
