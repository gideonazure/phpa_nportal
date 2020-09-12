<?php

namespace App\Entity;

use App\Collection\CategoryPageArticles;
use App\Exception\CategoryNameCannnotBeEmpty;
use App\Exception\CategorySlugCannnotBeEmpty;
use App\Repository\CategoryRepository;
use App\ViewModel\Category as CategoryView;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"}, suffix="_category")
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notice;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="category")
     * @var Collection
     */
    private $articles;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * Category constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->articles = new ArrayCollection();
        $this->createAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }


    /**
     * @param mixed $name
     */
    public function addName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $slug
     */
    public function addSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @param mixed $notice
     */
    public function addNotice($notice): void
    {
        $this->notice = $notice;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return Collection
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function check(): void
    {
        if($this->name === null){
            throw new CategoryNameCannnotBeEmpty('Category name cannot be empty. Please check category name');
        }

    }

    public function getCategory(): CategoryView
    {
        return new CategoryView(
            $this->id,
            $this->name,
            $this->slug,
            $this->notice,
            $this->articles,
            $this->createAt,
            $this->updatedAt
        );
    }

}
