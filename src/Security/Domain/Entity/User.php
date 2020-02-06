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

    private int $id;
    private string $username = '';
    private string $email    = '';

    /** @var string[] */
    private array $roles                 = [];
    private string $password             = '';
    private string $name                 = '';
    private string $surname              = '';
    private string $gender               = '';
    private ?DateTimeInterface $birthday = null;
    private string $phone                = '';
    private string $address              = '';
    private string $city                 = '';
    private string $country              = '';
    private string $postalCode           = '';
    private string $identityNumber       = '';
    private DateTimeInterface $created;
    private DateTimeInterface $modified;

    public function __construct()
    {
        $this->setCreatedAt();
        $this->modified = $this->created;
    }

    /**
     * @return string[] The user roles
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = self::ROLE_USER;

        return \array_unique($roles);
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return (string) $this->password;
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

    public function getUsername()
    {
        return $this->username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addRole(string $role): self
    {
        \array_push($this->roles, $role);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setBirthday(DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getBirthday(): ?DateTimeInterface
    {
        return $this->birthday;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function setIdentityNumber(string $identityNumber): self
    {
        $this->identityNumber = $identityNumber;

        return $this;
    }

    public function getIdentityNumber(): string
    {
        return $this->identityNumber;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getCreated(): DateTimeInterface
    {
        return $this->created;
    }

    public function getModified(): DateTimeInterface
    {
        return $this->modified;
    }
}
