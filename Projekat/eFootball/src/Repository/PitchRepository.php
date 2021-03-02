<?php

namespace App\Repository;

use App\Entity\Company;
use App\Entity\Pitch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pitch|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pitch|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pitch[]    findAll()
 * @method Pitch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PitchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pitch::class);
    }

    /**
     * @param $id
     *
     * @return Pitch|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOnePitchById($id): ?Pitch
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param Pitch $pitch
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function save(Pitch  $pitch)
    {
        $this->_em->persist($pitch);
    }
}
