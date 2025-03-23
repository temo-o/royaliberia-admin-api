<?php

namespace App\Repository;

use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PersonRepository
{
    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    public function create(array $data): Person
    {
        $person = new Person();
        

        return $person;
    }
}