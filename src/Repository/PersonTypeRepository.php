<?php

namespace App\Repository;

use App\Entity\Person;
use App\Entity\PersonType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;

class PersonTypeRepository
{
    private ObjectRepository $repository;
    public function __construct(protected EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(PersonType::class);
    }

    public function find(int $id): ?PersonType
    {
        return $this->repository->find($id);
    }
}