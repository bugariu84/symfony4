<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getUserPosts(User $user)
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.updatedAt', 'DESC')
            ->where('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function getAll()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.updatedAt', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @param int $page
     * @return Pagerfanta
     */
    public function findLatest(int $page = 1) : Pagerfanta
    {
        $queryBuilder = $this
            ->createQueryBuilder('posts')
            ->leftJoin('posts.user', 'users')
            ->where('posts.createdAt <= :now')
            ->setParameter('now', new \DateTime())
        ;

        return $this->createPaginator($queryBuilder->getQuery(), $page);
    }

    public function createPaginator(Query $query, int $page) : Pagerfanta
    {
        $paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(Post::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $paginator;
    }
}
