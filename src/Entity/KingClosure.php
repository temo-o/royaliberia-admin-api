<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "king_closure")]
class KingClosure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "integer")]
    private int $ancestor_id;

    #[ORM\Column(type: "integer")]
    private int $descendant_id;

    #[ORM\Column(type: "integer")]
    private int $depth;

    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeInterface $createdAt;

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
     * @return int
     */
    public function getAncestorId(): int
    {
        return $this->ancestor_id;
    }

    /**
     * @param int $ancestor_id
     */
    public function setAncestorId(int $ancestor_id): void
    {
        $this->ancestor_id = $ancestor_id;
    }

    /**
     * @return int
     */
    public function getDescendantId(): int
    {
        return $this->descendant_id;
    }

    /**
     * @param int $descendant_id
     */
    public function setDescendantId(int $descendant_id): void
    {
        $this->descendant_id = $descendant_id;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     */
    public function setDepth(int $depth): void
    {
        $this->depth = $depth;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
