<?php

namespace App\Repository;

use App\Entity\Recrutement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Recruitment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recruitment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recruitment[]    findAll()
 * @method Recruitment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecrutementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recrutement::class);

    }

    /*
     * @return Query
     */
    public function findOfficialJobs()
    {
        return $this->defaultQuery()
            ->andWhere("role.id >= 1000")
            ->andWhere("DATE_ADD(r.recDate, r.recDuree, 'day') > CURRENT_TIMESTAMP()")
            ->andWhere("r.recDate < CURRENT_TIMESTAMP()")
            ->orderBy('r.recDate')
            ->join('r.role', 'role')
            ->getQuery()
            ->getResult();

    }

    public function findOtherJobs()
    {
        return $this->defaultQuery()
            ->andWhere("role.id < 1000")
            ->andWhere("DATE_ADD(r.recDate, r.recDuree, 'day') > CURRENT_TIMESTAMP()")
            ->andWhere("r.recDate < CURRENT_TIMESTAMP()")
            ->orderBy('r.recDate')
            ->join('r.role', 'role')
            ->getQuery()
            ->getResult();

    }

    private function defaultQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('r');
    }
}
