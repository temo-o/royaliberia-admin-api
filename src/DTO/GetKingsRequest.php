<?php

namespace App\DTO;

use App\DTO\Interfaces\RequestDtoInterface;
use Symfony\Component\Validator\Constraints as Assert;

class GetKingsRequest implements RequestDtoInterface
{

    #[Assert\Type("int")]
    public int $personId;

    #[Assert\Type("int")]
    public string $positionStartDate;
}