<?php

namespace App\Entity;

use App\Collection\Categories;
use App\Exception\ArticleCategoryCannotBeEmptyException;
use App\ViewModel\ArticlePage;
use App\ViewModel\CategoryPageArticle;
use App\ViewModel\HomePageArticle;
use App\Exception\ArticleBodyCannotBeEmptyException;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $category;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="articles")
     * @var Collection
     */
    private Collection $categories;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $image = null;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private ?string $shortDescription = null;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $body = null;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeImmutable $publicationDate = null;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $updatedAt;

    /**
     * Article constructor.
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
        $this->categories = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getHomePageArticle(): HomePageArticle
    {
        return new HomePageArticle(
            $this->id,
            $this->category,
            $this->title,
            $this->publicationDate,
            $this->image,
            $this->shortDescription
        );
    }

    public function getArticlePageContent(): ArticlePage
    {
        return new ArticlePage(
            $this->id,
            $this->category,
            $this->title,
            $this->body,
            $this->publicationDate
        );
    }

//    public function getCategoryPageArticle(): CategoryPageArticle
//    {
//        return new CategoryPageArticle(
//            $this->id,
//            'Set category here', //TODO: need add category names
//            $this->title,
//            $this->body,
//            $this->publicationDate
//        );
//    }

    /**
     * @param string|null $image
     * @return Article
     */
    public function addImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param string|null $shortDescription
     * @return Article
     */
    public function addShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * @param string|null $body
     * @return Article
     */
    public function addBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param integer|null $category
     * @return Article
     */
    public function addCategory(?int $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getCategor(): Collection
    {
        return $this->categories;
    }



    /**
     * @throws ArticleBodyCannotBeEmptyException
     * @throws ArticleCategoryCannotBeEmptyException
     */
    public function publish(): void
    {
        if($this->body === null){
            throw new ArticleBodyCannotBeEmptyException();
        }

        if($this->category === null){
            throw new ArticleCategoryCannotBeEmptyException();
        }

        $this->publicationDate = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

}
