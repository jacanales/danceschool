<?php

declare(strict_types=1);

namespace App\Security\Domain\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    public const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    public const ROLE_USER        = 'ROLE_USER';
    public const GENDERS          = ['m', 'f'];

    public string $email                = '';
    public string $name                 = '';
    public string $surname              = '';
    public string $gender               = '';
    public ?DateTimeInterface $birthday = null;
    public string $phone                = '';
    public string $address              = '';
    public string $city                 = '';
    public string $country              = '';
    public string $postalCode           = '';
    public string $identityNumber       = '';

    private int $id;
    private string $username = '';

    /** @var string[] */
    private array $roles     = [];
    private string $password = '';
    private DateTimeInterface $created;
    private DateTimeInterface $modified;

    public function __construct()
    {
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    /**
     * @return string[] The user roles
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // guarantee every user at least has ROLE_USER
        $this->roles[] = self::ROLE_USER;

        return \array_unique($this->roles);
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addRole(string $role): self
    {
        $this->roles[] = $role;

        return $this;
    }

    public function setCreatedAt(): void
    {
        $this->created = new DateTimeImmutable('now');
    }

    public function setUpdatedAt(): void
    {
        $this->modified = new DateTimeImmutable('now');
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }
}
