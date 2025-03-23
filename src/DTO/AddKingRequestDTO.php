<?php

namespace App\DTO;

class AddKingRequestDTO
{
    public ?string $firstName;
    public ?string $lastName;
    public ?string $additionalName;
    public ?string $pseudonym;
    public ?string $courtesyTitle;
    public ?string $title;
    public ?int $imageSequenceCount;
    public ?int $positionStartYear;
    public ?int $positionEndYear;
    public ?string $positionExactStartDate;
    public ?string $positionExactEndDate;
    public ?string $dateOfBirth;
    public ?string $dateOfDeath;

    public int $personTypeId = 3;
}
