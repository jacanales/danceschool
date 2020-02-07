<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\Security\Domain\Builder\UserBuilder;
use App\Security\Domain\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    private ObjectManager $manager;
    private UserPasswordEncoderInterface $passwordEncoder;
    private UserBuilder $builder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, UserBuilder $builder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->builder         = $builder;
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $this->addUser('admin', 'jcanales@zonadev.es', User::ROLE_SUPER_ADMIN, 'admin');
        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }

    private function addUser(string $username, string $email, string $role = User::ROLE_USER, string $password = null): void
    {
        if (!$password) {
            $password = Factory::create()->password;
        }

        $user = $this->builder
            ->create()
            ->withUserName($username)
            ->withPassword($password, $this->passwordEncoder)
            ->withEmail($email)
            ->withRole($role)
            ->build();

        $this->manager->persist($user);
        $this->manager->flush();
    }
}
