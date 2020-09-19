<?php

declare(strict_types=1);

namespace App\ViewModel;

final class ArticlePage
{
    private int $id;
    private \App\Entity\Category $category;
    private string $title;
    private string $text;
    private \DateTimeImmutable $publicationDate;

    public function __construct(
        int $id,
        \App\Entity\Category $category,
        string $title,
        string $text,
        \DateTimeImmutable $publicationDate
    ) {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->text = $text;
        $this->publicationDate = $publicationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): \App\Entity\Category
    {
        return $this->category;
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
