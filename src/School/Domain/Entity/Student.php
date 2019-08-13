<?php

declare(strict_types=1);

namespace App\School\Domain\Entity;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class Student
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $captationMethod;

    /**
     * @var bool
     */
    protected $member;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var \DateTime
     */
    protected $contractExpiration;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var GroupStudent
     */
    protected $groupStudent;

    /**
     * @var StudentAnnotation
     */
    protected $annotations;

    public function __construct()
    {
        $this->annotations  = new ArrayCollection();
        $this->groupStudent = new ArrayCollection();
    }

    /**
     * @return int
     */
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
     * @return Student
     */
    public function setCaptationMethod(int $captationMethod): self
    {
        $this->captationMethod = $captationMethod;

        return $this;
    }

    /**
     * @return int
     */
    public function getCaptationMethod(): ?int
    {
        return $this->captationMethod;
    }

    public function setMember(bool $member): self
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMember(): ?bool
    {
        return $this->member;
    }

    public function setContractExpiration(\DateTime $contractExpiration): self
    {
        $this->contractExpiration = $contractExpiration;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getContractExpiration(): ?\DateTime
    {
        return $this->contractExpiration;
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

    public function addAnnotation(StudentAnnotation $annotation): self
    {
        $this->annotations->add($annotation);

        return $this;
    }

    public function removeAnnotation(StudentAnnotation $annotation): void
    {
        $this->annotations->removeElement($annotation);
    }

    public function getAnnotations(): ArrayCollection
    {
        return $this->annotations;
    }

    public function setAccountNumber(string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    public function getFullName(): string
    {
        return $this->getUser()->getName() . ' ' . $this->getUser()->getLastname();
    }
}
