<?php

namespace App\Service;

use App\Repository\PersonRepository;

class PersonService
{
    public function __construct(protected PersonRepository $personRepository)
    {
    }

    public function createPerson(array $data): array
    {
        $this->personRepository->create($data);
    }
}