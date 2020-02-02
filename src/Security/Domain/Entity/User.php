<?php

declare(strict_types=1);

namespace App\Security\Domain\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    protected $surname      = '';
    protected $gender       = '';
    protected $birthday;
    protected $phone          = '';
    protected $address        = '';
    protected $city           = '';
    protected $country        = '';
    protected $postalCode     = '';
    protected $identityNumber = '';
    protected $created;
    protected $modified;

    private $id;
    private $username;
    private $roles;
    private $password;

    private $name = '';

    public function __construct()
    {
        parent::__construct();

        $this->setCreatedAt();
    }

    public function setCreatedAt(): void
    {
        $this->createdAt(new \DateTimeImmutable('now'));
    }

    public function setUpdatedAt(): void
    {
        if (null === $this->name) {
            $this->name = $this->getUsername();
        }

        $this->modified(new \DateTime('now'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return \array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
