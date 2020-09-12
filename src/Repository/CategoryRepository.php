<?php

namespace App\Repository;

use App\Entity\Category;
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
        return $this->findOneBy(array('id' => $id));
    }

    public function getBySlug(string $slug): object
    {
        return $this->findOneBy(array('slug' => $slug));
    }

    public function getCount(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
