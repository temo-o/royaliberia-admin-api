<?php

namespace App\Repository;

use App\Entity\KingClosure;
use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;

class KingsRepository{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function getKingsByDate(): array
    {
        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('p')
            ->from(Person::class, 'p')
            ->orderBy('p.positionStartYear', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function getKingsClosure1(): array
    {
        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('p1', 'p2', 'kc.depth')
            ->from(KingClosure::class, 'kc')
            ->innerJoin(Person::class, 'p1', 'WITH', 'kc.ancestor_id = p1.id')
            ->innerJoin(Person::class, 'p2', 'WITH', 'kc.descendant_id = p2.id')
            ->orderBy('kc.depth', 'ASC');

        return $qb->getQuery()->getResult();
    }
    public function getKingsClosure(): array
    {
        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('p2', 'kc.depth')
            ->from(KingClosure::class, 'kc')
            ->innerJoin(Person::class, 'p2', 'WITH', 'kc.descendant_id = p2.id')
            ->orderBy('kc.depth', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function store(Person $person): void
    {
        $person->setCreatedAt(new \DateTime());
        $this->entityManager->persist($person);
        $this->entityManager->flush();
    }

}