<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\School\Domain\Builder\TeacherBuilder;
use App\Security\Domain\Builder\UserBuilder;
use App\Security\Domain\Entity\User;
use App\Security\Infrastructure\Repository\UserRepository;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadTeacherData extends AbstractFixture implements OrderedFixtureInterface
{
    public const MAX_TEACHERS = 5;

    private ObjectManager $manager;
    private UserPasswordEncoderInterface $passwordEncoder;
    private UserBuilder $userBuilder;
    private Generator $faker;
    private TeacherBuilder $teacherBuilder;
    private UserRepository $userRepository;

    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        UserBuilder $userBuilder,
        TeacherBuilder $teacherBuilder,
        UserRepository $userRepository
    ) {
        $this->passwordEncoder = $passwordEncoder;
        $this->userBuilder     = $userBuilder;
        $this->teacherBuilder  = $teacherBuilder;
        $this->faker           = Factory::create();
        $this->userRepository  = $userRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        for ($i = 1; $i <= self::MAX_TEACHERS; ++$i) {
            $gender = User::GENDERS[\array_rand(User::GENDERS)];

            $user = $this->userBuilder
                ->create()
                ->withUserName($this->faker->unique()->userName)
                ->withEmail($this->faker->unique()->email)
                ->withPassword($this->faker->password, $this->passwordEncoder)
                ->withRole(User::ROLE_USER)
                ->withName($this->faker->name($gender))
                ->withSurname($this->faker->lastName)
                ->withGender($gender)
                ->withIdentityNumber((string) $this->faker->unique()->randomDigit)
                ->withAddress($this->faker->address)
                ->withCity($this->faker->city)
                ->withCountry($this->faker->countryCode)
                ->withPostalCode($this->faker->postcode)
                ->build();

            $teacher = $this->teacherBuilder
                ->create()
                ->withWage($this->faker->randomFloat(2))
                ->withComment($this->faker->text)
                ->withUser($user)
                ->build();

            $this->manager->persist($teacher);
        }

        $this->manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}
