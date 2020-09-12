<?php

declare(strict_types=1);

namespace App\ViewModel;

final class CategoryPageArticle
{
    private int $id;
    private string $categoryTitle;
    private string $title;
    private \DateTimeImmutable $publicationDate;
    private string $shortDescription;
    private string $categorySlug;
    private string $image;

    public function __construct(
        int $id,
        string $title,
        string $image,
        string $shortDescription,
        string $categorySlug,
        string $categoryTitle,
        \DateTimeImmutable $publicationDate
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->shortDescription = $shortDescription;
        $this->categoryTitle = $categoryTitle;
        $this->categorySlug = $categorySlug;
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

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @return string
     */
    public function getCategorySlug(): string
    {
        return $this->categorySlug;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }
}
