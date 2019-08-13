<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $lastname = '';

    /**
     * @var string
     */
    protected $gender = '';

    /**
     * @var \DateTime
     */
    protected $birthday;

    /**
     * @var string
     */
    protected $phone = '';

    /**
     * @var string
     */
    protected $address = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @var string
     */
    protected $country = '';

    /**
     * @var string
     */
    protected $postalCode = '';

    /**
     * @var string
     */
    protected $identityNumber = '';

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $modified;

    protected $facebookId;

    public function __construct()
    {
        parent::__construct();

        $this->setCreatedAt();
    }

    public function setCreatedAt(): void
    {
        $this->setCreated(new \DateTime('now'));
    }

    public function setUpdatedAt(): void
    {
        if (\is_null($this->name)) {
            $this->name = $this->getUsername();
        }

        $this->setModified(new \DateTime('now'));
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
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

    public function setBirthday(\DateTime $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday(): ?\DateTime
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

    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setIdentityNumber(string $identityNumber): self
    {
        $this->identityNumber = $identityNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentityNumber(): ?string
    {
        return $this->identityNumber;
    }

    public function setCreated(\DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function setModified(\DateTime $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModified(): ?\DateTime
    {
        return $this->modified;
    }

    public function setFacebookId(string $facebookId): void
    {
        $this->facebookId = $facebookId;
        $this->salt       = '';
    }

    /**
     * @return string
     */
    public function getFacebookId(): ?string
    {
        return $this->facebookId;
    }
}
