<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\School\Domain\Builder\StudentBuilder;
use App\Security\Domain\Builder\UserBuilder;
use App\Security\Domain\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadStudentData extends AbstractFixture implements OrderedFixtureInterface
{
    private const MAX_STUDENTS = 10;

    private ObjectManager $manager;
    private UserBuilder $userBuilder;
    private Generator $faker;
    private UserPasswordEncoderInterface $encoder;
    private StudentBuilder $studentBuilder;

    public function __construct(UserBuilder $userBuilder, StudentBuilder $studentBuilder, UserPasswordEncoderInterface $encoder)
    {
        $this->userBuilder    = $userBuilder;
        $this->studentBuilder = $studentBuilder;
        $this->faker          = Factory::create();
        $this->encoder        = $encoder;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        for ($i = 1; $i <= self::MAX_STUDENTS; ++$i) {
            $gender = User::GENDERS[\array_rand(User::GENDERS)];

            $user = $this->userBuilder
                ->create()
                ->withUserName($this->faker->unique()->userName)
                ->withEmail($this->faker->unique()->email)
                ->withPassword($this->faker->password, $this->encoder)
                ->withRole(User::ROLE_USER)
                ->withName($this->faker->name($gender))
                ->withSurname($this->faker->lastName)
                ->withGender($gender)
                ->withIdentityNumber((string) $this->faker->unique()->sha1)
                ->withAddress($this->faker->address)
                ->withCity($this->faker->city)
                ->withCountry($this->faker->countryCode)
                ->withPostalCode($this->faker->postcode)
                ->build();

            $student = $this->studentBuilder
                ->create()
                ->withMembership($this->faker->boolean())
                ->withComment($this->faker->text)
                ->withUser($user)
                ->build();

            $this->manager->persist($student);
        }

        $this->manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}
