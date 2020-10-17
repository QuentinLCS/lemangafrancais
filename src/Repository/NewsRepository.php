<?php

namespace App\Repository;

use App\Entity\News;
use App\Entity\NewsSearch;
use App\Form\News\NewsSearchType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @param NewsSearch $search
     * @return Query
     */
    public function findAllVisibleQuery(NewsSearch $search): Query
    {
        $query = $this->defaultQuery()
            ->orderBy('n.newsDateCreation', 'DESC')
        ;

        if ($search->getTitre()) {
            $query = $query
                ->andWhere('n.newsTitre like :titre')
                ->setParameter('titre', '%'.$search->getTitre().'%');
        }

        return $query->getQuery();
    }

    public function countAll() : string
    {
        return $this->defaultQuery()
            ->select('COUNT(n)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    private function defaultQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('n');
    }
    // /**
    //  * @return News[] Returns an array of News objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?News
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
