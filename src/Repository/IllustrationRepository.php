<?php

namespace App\Repository;

use App\Entity\Illustration;
use App\Entity\IllustrationSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Illustration|null find($id, $lockMode = null, $lockVersion = null)
 * @method Illustration|null findOneBy(array $criteria, array $orderBy = null)
 * @method Illustration[]    findAll()
 * @method Illustration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IllustrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Illustration::class);
    }
    public function findAllVisibleQuery(IllustrationSearch $search): Query
    {
        $query = $this->defaultQuery();

        if ($search->getTitre()) {
            $query = $query
                ->andWhere('i.IllTitre like :search')
                ->orderBy('i.IllTitre')
                ->setParameter('search', $search->getTitre().'%');
        }
        return $query->getQuery();
    }
    private function defaultQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('i')
            ;
    }

    // /**
    //  * @return Illustration[] Returns an array of Illustration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Illustration
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
