<?php

declare(strict_types=1);

namespace App\Security\Domain\Builder;

use App\Security\Domain\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserBuilder
{
    private User $user;

    public function create(): self
    {
        $this->user = new User();

        return $this;
    }

    public function withUserName(string $username): self
    {
        $this->user->setUsername($username);

        return $this;
    }

    public function withPassword(string $password, UserPasswordEncoderInterface $encoder = null): self
    {
        if (null !== $encoder) {
            $password = $encoder->encodePassword($this->user, $password);
        }

        $this->user->setPassword($password);

        return $this;
    }

    public function withEmail(string $email): self
    {
        $this->user->email = $email;

        return $this;
    }

    public function withRole(string $role): self
    {
        $this->user->addRole($role);

        return $this;
    }

    public function withName(string $name): self
    {
        $this->user->name = $name;

        return $this;
    }

    public function withSurname(string $surname): self
    {
        $this->user->surname = $surname;

        return $this;
    }

    public function withGender(string $gender): self
    {
        $this->user->gender = $gender;

        return $this;
    }

    public function withIdentityNumber(string $number): self
    {
        $this->user->identityNumber = $number;

        return $this;
    }

    public function withAddress(string $address): self
    {
        $this->user->address = $address;

        return $this;
    }

    public function withCity(string $city): self
    {
        $this->user->city = $city;

        return $this;
    }

    public function withCountry(string $countryCode): self
    {
        $this->user->country = $countryCode;

        return $this;
    }

    public function withPostalCode(string $postcode): self
    {
        $this->user->postalCode = $postcode;

        return $this;
    }

    public function build(): User
    {
        return $this->user;
    }
}
