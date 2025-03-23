<?php

namespace App\Factory;

use App\DTO\AddKingRequestDTO;
use App\Entity\Person;
use App\Repository\PersonTypeRepository;
use Symfony\Component\Serializer\SerializerInterface;

class PersonFactory
{

    public function __construct(private readonly SerializerInterface $serializer, private readonly PersonTypeRepository $personTypeRepository) {
    }

    public function createFromDto(AddKingRequestDTO $dto): Person
    {
        $person =  $this->serializer->denormalize(
            (array) $dto,
            Person::class,
            'array'
        );

        $personType = $this->personTypeRepository->find($dto->personTypeId);

        $person->setPersonType($personType);

        return $person;
    }
}
