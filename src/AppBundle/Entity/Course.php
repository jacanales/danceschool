<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Course
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var Group[]
     */
    protected $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Group[]
     */
    public function getGroups(): array
    {
        return $this->groups->toArray();
    }

    /**
     * @param Group[] $groups
     *
     * @return self
     */
    public function setGroups(array $groups): self
    {
        $this->groups = new ArrayCollection($groups);

        return $this;
    }
}
