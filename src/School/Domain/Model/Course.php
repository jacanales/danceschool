<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Course
{
    private int $id;
    private string $name;
    private float $price;
    /** @var ArrayCollection<int, Group> */
    private ArrayCollection $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

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
     * @return Course
     */
    public function setGroups(array $groups): self
    {
        $this->groups = new ArrayCollection($groups);

        return $this;
    }
}
