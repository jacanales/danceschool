<?php

namespace App\Entity;

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
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param float $wage
     *
     * @return self
     */
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

    /**
     * @param string $comment
     *
     * @return self
     */
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
     *
     * @return self
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

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getUser()->getName() . ' ' . $this->getUser()->getLastname();
    }
}
