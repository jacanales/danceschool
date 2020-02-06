<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use App\Security\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class Teacher
{
    private int $id;
    private User $user;
    private float $wage;
    private string $comment;
    /** @var ArrayCollection<int, Group> */
    private ArrayCollection $groups;

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

    public function setWage(float $wage): self
    {
        $this->wage = $wage;

        return $this;
    }

    public function getWage(): ?float
    {
        return $this->wage;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
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
        return $this->getUser()->getName() . ' ' . $this->getUser()->getSurname();
    }
}
