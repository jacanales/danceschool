<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use App\Security\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Teacher
{
    public ?float $wage;
    public string $comment = '';

    private int $id;
    private User $user;
    /** @var Collection<int, Group> */
    private Collection $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getFullName(): string
    {
        return $this->user->getFullName();
    }
}
