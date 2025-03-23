<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity()]
#[ORM\Table(name: 'relationships')]
class Relationship
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Person::class, inversedBy: 'relationshipsInitiated')]
    #[ORM\JoinColumn(name: 'person1_id', referencedColumnName: 'id')]
    private Person $person1;

    #[ORM\ManyToOne(targetEntity: Person::class, inversedBy: 'relationshipsReceived')]
    #[ORM\JoinColumn(name: 'person2_id', referencedColumnName: 'id')]
    private Person $person2;

    /**
     * @ORM\ManyToOne(targetEntity=RelationshipType::class)
     * @ORM\JoinColumn(name="relationship_type_id", referencedColumnName="id", nullable=false)
     */
    private RelationshipType $relationshipType;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?DateTime $startDate = null;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?DateTime $endDate = null;

    /**
     * @ORM\Column(type="smallint")
     */
    private int $statusFlag;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

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
     * @return Person
     */
    public function getPerson1(): Person
    {
        return $this->person1;
    }

    /**
     * @param Person $person1
     */
    public function setPerson1(Person $person1): void
    {
        $this->person1 = $person1;
    }

    /**
     * @return Person
     */
    public function getPerson2(): Person
    {
        return $this->person2;
    }

    /**
     * @param Person $person2
     */
    public function setPerson2(Person $person2): void
    {
        $this->person2 = $person2;
    }

    /**
     * @return RelationshipType
     */
    public function getRelationshipType(): RelationshipType
    {
        return $this->relationshipType;
    }

    /**
     * @param RelationshipType $relationshipType
     */
    public function setRelationshipType(RelationshipType $relationshipType): void
    {
        $this->relationshipType = $relationshipType;
    }

    /**
     * @return DateTime|null
     */
    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime|null $startDate
     */
    public function setStartDate(?DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTime|null
     */
    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime|null $endDate
     */
    public function setEndDate(?DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getStatusFlag(): int
    {
        return $this->statusFlag;
    }

    /**
     * @param int $statusFlag
     */
    public function setStatusFlag(int $statusFlag): void
    {
        $this->statusFlag = $statusFlag;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}