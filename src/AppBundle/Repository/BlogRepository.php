<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BlogRepository extends EntityRepository
{
    public function findThreeNewest()
    {
        return $this->createQueryBuilder('post')
                ->orderBy('post.addDate', 'DESC')
                ->setMaxResults(3)
                ->getQuery()
                ->execute();
    }
}