<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use App\Security\Domain\Entity\User;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Student
{
    private int $id;
    private int $captationMethod;
    private bool $isMember;
    private string $accountNumber;
    private DateTimeInterface $contractExpiration;
    private string $comment;
    private User $user;
    /** @var ArrayCollection<int, GroupStudent> */
    private ArrayCollection $groupStudent;
    /** @var ArrayCollection<int, StudentAnnotation> */
    private ArrayCollection $annotations;

    public function __construct()
    {
        $this->annotations  = new ArrayCollection();
        $this->groupStudent = new ArrayCollection();
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

    public function setCaptationMethod(int $captationMethod): self
    {
        $this->captationMethod = $captationMethod;

        return $this;
    }

    public function getCaptationMethod(): ?int
    {
        return $this->captationMethod;
    }

    public function setIsMember(bool $isMember): self
    {
        $this->isMember = $isMember;

        return $this;
    }

    public function getIsMember(): ?bool
    {
        return $this->isMember;
    }

    public function setContractExpiration(DateTimeInterface $contractExpiration): self
    {
        $this->contractExpiration = $contractExpiration;

        return $this;
    }

    public function getContractExpiration(): ?DateTimeInterface
    {
        return $this->contractExpiration;
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

    public function addAnnotation(StudentAnnotation $annotation): self
    {
        $this->annotations->add($annotation);

        return $this;
    }

    public function removeAnnotation(StudentAnnotation $annotation): void
    {
        $this->annotations->removeElement($annotation);
    }

    /**
     * @return ArrayCollection<int, StudentAnnotation>
     */
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
        return $this->getUser()->getName() . ' ' . $this->getUser()->getSurname();
    }
}
