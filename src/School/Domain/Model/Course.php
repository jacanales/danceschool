<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Course
{
    public string $name;
    public float $price;
    private int $id;
    /** @var Collection<int, Group> */
    private Collection $groups;

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
