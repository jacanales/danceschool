<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use App\Security\Domain\Entity\User;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Student
{
    public const NAME                      = 'student';
    public const JOIN_NAME                 = 'students';
    private const DEFAULT_CAPTATION_METHOD = 0;

    private int $id;
    private int $captationMethod                   = self::DEFAULT_CAPTATION_METHOD;
    private bool $isMember                         = false;
    private string $accountNumber                  = '';
    private ?DateTimeInterface $contractExpiration = null;
    private string $comment                        = '';
    private User $user;
    /** @var Collection<int, GroupStudent> */
    private Collection $groupStudent;
    /** @var Collection<int, StudentAnnotation> */
    private Collection $annotations;

    public function __construct()
    {
        $this->user         = new User();
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

    public function getCaptationMethod(): int
    {
        return $this->captationMethod ?? self::DEFAULT_CAPTATION_METHOD;
    }

    public function setIsMember(bool $isMember): self
    {
        $this->isMember = $isMember;

        return $this;
    }

    public function isMember(): ?bool
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

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

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

    /**
     * @return Collection<int, StudentAnnotation>
     */
    public function getAnnotations(): Collection
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
        return $this->user->getName() . ' ' . $this->user->getSurname();
    }
}
