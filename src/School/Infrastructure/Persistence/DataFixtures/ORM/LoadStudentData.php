<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\Security\Domain\Entity\User;
use App\School\Domain\Entity\Student;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class LoadStudentData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private const MAX_STUDENTS = 50;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $faker = Factory::create();

        for ($i = 1; $i <= self::MAX_STUDENTS; ++$i) {
            $user = new User();

            $user
                ->setUsername($faker->userName . $i)
                ->setEmail($i . $faker->email)
                ->setPassword($this->generatePassword($user))
                ->addRole(User::ROLE_DEFAULT);

            $user
                ->setName($faker->name)
                ->setLastname($faker->lastName)
                ->setGender('m')
                ->setPhone($faker->phoneNumber)
                ->setIdentityNumber((string) $faker->randomNumber(8))
                ->setAddress($faker->address)
                ->setCity($faker->city)
                ->setCountry($faker->countryCode)
                ->setPostalCode($faker->postcode);

            $student = new Student();
            $student->setUser($user);
            $student->setComment($faker->text(50));
            $student->setCaptationMethod(0);
            $student->setContractExpiration($faker->dateTimeThisYear);
            $student->setMember($faker->boolean());
            $student->setAccountNumber($faker->bankAccountNumber);

            $this->manager->persist($student);
        }

        $this->manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }

    private function generatePassword(User $user): string
    {
        /**
         * @var UserPasswordEncoder
         */
        $encoder = $this->container
            ->get('security.password_encoder');

        $password = \mb_substr(\str_shuffle(\sha1(\microtime())), 0, 20);

        return $encoder->encodePassword($user, $password);
    }
}
