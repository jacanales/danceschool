<?php

namespace App\Entity;

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
     * @param int $captationMethod
     *
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

    /**
     * @param bool $member
     *
     * @return self
     */
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

    /**
     * @param \DateTime $contractExpiration
     *
     * @return self
     */
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
     * @param StudentAnnotation $annotation
     *
     * @return self
     */
    public function addAnnotation(StudentAnnotation $annotation): self
    {
        $this->annotations->add($annotation);

        return $this;
    }

    /**
     * @param StudentAnnotation $annotation
     */
    public function removeAnnotation(StudentAnnotation $annotation): void
    {
        $this->annotations->removeElement($annotation);
    }

    /**
     * @return ArrayCollection
     */
    public function getAnnotations(): ArrayCollection
    {
        return $this->annotations;
    }

    /**
     * @param string $accountNumber
     *
     * @return self
     */
    public function setAccountNumber(string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getUser()->getName() . ' ' . $this->getUser()->getLastname();
    }
}
