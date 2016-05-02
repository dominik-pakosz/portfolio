<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PortfolioRepository extends EntityRepository
{
    public function findThreeNewest()
    {
        return $this->createQueryBuilder('work')
                ->orderBy('work.addDate', 'DESC')
                ->setMaxResults(3)
                ->getQuery()
                ->execute();
    }
}