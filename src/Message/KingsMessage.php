<?php
namespace App\Message;

class KingsMessage
{
    public function __construct(
        private string $firstname,
        private string $lastname,
        private string $courtesyTitle,
        private int $positionStartYear,
        private int $positionEndYear
    ) {}

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getCourtesyTitle(): string
    {
        return $this->courtesyTitle;
    }

    public function getPositionStartYear(): int
    {
        return $this->positionStartYear;
    }

    public function getPositionEndYear(): int
    {
        return $this->positionEndYear;
    }
}
