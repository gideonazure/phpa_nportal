<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Category;
use App\Exception\CategoryNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getList(): array
    {
        $query = $this->createQueryBuilder('c')
            ->orderBy('c.name', 'DESC')
            ->getQuery();

        return $query->getResult();
    }

    public function getById(int $id): object
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function getBySlug(string $slug): object
    {
        $result = $this->findOneBy(['slug' => $slug]);

        if (null === $result) {
            throw new CategoryNotFoundException('Sorry, this category not found');
        }

        return $result;
    }

    public function getCount(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
