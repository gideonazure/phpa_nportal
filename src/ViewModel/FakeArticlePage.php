<?php

declare(strict_types=1);

namespace App\ViewModel;

final class FakeArticlePage
{
    private int $id;
    private string $categoryTitle;
    private string $title;
    private string $text;
    private \DateTimeImmutable $publicationDate;

    public function __construct(
        int $id,
        string $categoryTitle,
        string $title,
        string $text,
        \DateTimeImmutable $publicationDate
    ) {
        $this->id = $id;
        $this->categoryTitle = $categoryTitle;
        $this->title = $title;
        $this->text = $text;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getPublicationDate(): \DateTimeImmutable
    {
        return $this->publicationDate;
    }
}
