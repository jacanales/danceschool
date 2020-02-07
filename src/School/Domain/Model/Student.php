<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use App\Security\Domain\Entity\User;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Student
{
    public const NAME                             = 'student';
    private const DEFAULT_CAPTATION_METHOD        = 0;
    public int $captationMethod                   = self::DEFAULT_CAPTATION_METHOD;
    public bool $isMember                         = false;
    public string $accountNumber                  = '';
    public ?DateTimeInterface $contractExpiration = null;
    public string $comment                        = '';

    private int $id;
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

    public function getFullName(): string
    {
        return $this->user->getFullName();
    }
}
