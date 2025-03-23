<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity]
#[ORM\Table(name: "person")]
class Person implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: "PersonType", cascade: ["persist"])]
    #[ORM\JoinColumn(name: "person_type", referencedColumnName: "id", onDelete: "RESTRICT")]
    private PersonType $personType;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $firstName;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $lastName;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $additionalName;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $pseudonym;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $courtesyTitle;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $title;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $imageSequenceCount;

    #[ORM\Column(type: "integer", length: 4,  nullable: true)]
    private ?int $positionStartYear;

    #[ORM\Column(type: "integer", length: 4,  nullable: true)]
    private ?int $positionEndYear;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $positionExactStartDate;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $positionExactEndDate;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $dateOfBirth;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $dateOfDeath;

    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTimeInterface $updatedAt;

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'additionalName' => $this->additionalName,
            'pseudonym' => $this->pseudonym,
            'courtesyTitle' => $this->courtesyTitle,
            'title' => $this->title,
            'dateOfBirth' => $this->dateOfBirth?->format('Y-m-d'),
            'imageSequenceCount' => $this->imageSequenceCount,
            'dateOfDeath' => $this->dateOfDeath,
            'positionStartYear' => $this->positionStartYear,
            'positionEndYear' => $this->positionEndYear,
            'positionExactStartDate' => $this->positionExactStartDate,
            'positionExactEndDate' => $this->positionExactEndDate,
        ];
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt ??= new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPersonType(): PersonType
    {
        return $this->personType;
    }

    /**
     * @param mixed $personType
     */
    public function setPersonType(PersonType $personType): void
    {
        $this->personType = $personType;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getAdditionalName(): ?string
    {
        return $this->additionalName;
    }

    /**
     * @param string|null $additionalName
     */
    public function setAdditionalName(?string $additionalName): void
    {
        $this->additionalName = $additionalName;
    }

    /**
     * @return string|null
     */
    public function getPseudonym(): ?string
    {
        return $this->pseudonym;
    }

    /**
     * @param string|null $pseudonym
     */
    public function setPseudonym(?string $pseudonym): void
    {
        $this->pseudonym = $pseudonym;
    }

    /**
     * @return string|null
     */
    public function getCourtesyTitle(): ?string
    {
        return $this->courtesyTitle;
    }

    /**
     * @param string|null $courtesyTitle
     */
    public function setCourtesyTitle(?string $courtesyTitle): void
    {
        $this->courtesyTitle = $courtesyTitle;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string|null $dateOfBirth
     */
    public function setDateOfBirth(?string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getDateOfDeath(): ?string
    {
        return $this->dateOfDeath;
    }

    public function setDateOfDeath(?string $dateOfDeath): void
    {
        $this->dateOfDeath = $dateOfDeath;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getImageSequenceCount(): ?int
    {
        return $this->imageSequenceCount;
    }

    /**
     * @param int|null $imageSequenceCount
     */
    public function setImageSequenceCount(?int $imageSequenceCount): void
    {
        $this->imageSequenceCount = $imageSequenceCount;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     */
    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getPositionStartYear(): ?int
    {
        return $this->positionStartYear;
    }

    public function setPositionStartYear(?int $positionStartYear): void
    {
        $this->positionStartYear = $positionStartYear;
    }

    public function getPositionEndYear(): ?int
    {
        return $this->positionEndYear;
    }

    public function setPositionEndYear(?int $positionEndYear): void
    {
        $this->positionEndYear = $positionEndYear;
    }

    public function getPositionExactStartDate(): ?string
    {
        return $this->positionExactStartDate;
    }

    public function setPositionExactStartDate(?string $positionExactStartDate): void
    {
        $this->positionExactStartDate = $positionExactStartDate;
    }

    public function getPositionExactEndDate(): ?string
    {
        return $this->positionExactEndDate;
    }

    public function setPositionExactEndDate(?string $positionExactEndDate): void
    {
        $this->positionExactEndDate = $positionExactEndDate;
    }
}
