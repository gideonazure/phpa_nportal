<?php

declare(strict_types=1);

namespace App\ViewModel;

final class HomePageArticle
{
    private int $id;
    private \App\Entity\Category $category;
    private string $title;
    private \DateTimeImmutable $publicationDate;
    private ?string $image;
    private ?string $shortDescription;

    public function __construct(
        int $id,
        \App\Entity\Category $category,
        string $title,
        \DateTimeImmutable $publicationDate,
        ?string $image,
        ?string $shortDescription
    ) {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->publicationDate = $publicationDate;
        $this->image = $image;
        $this->shortDescription = $shortDescription;
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

    public function getPublicationDate(): \DateTimeImmutable
    {
        return $this->publicationDate;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }
}
