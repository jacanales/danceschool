<?php

declare(strict_types=1);

namespace App\School\Domain\Entity;

use App\Security\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class Teacher
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var float
     */
    protected $wage;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var Group[]
     */
    protected $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    /**
     * @return Teacher
     */
    public function getTeacher(): self
    {
        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setWage(float $wage): self
    {
        $this->wage = $wage;

        return $this;
    }

    /**
     * @return float
     */
    public function getWage(): ?float
    {
        return $this->wage;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user = null): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function getFullName(): string
    {
        return $this->getUser()->getName() . ' ' . $this->getUser()->getLastname();
    }
}
