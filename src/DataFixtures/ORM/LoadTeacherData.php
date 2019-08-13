<?php

declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\User;
use App\School\Domain\Entity\Teacher;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class LoadTeacherData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    public const MAX_TEACHERS = 5;

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

        $user = new User();

        $user->setUsername('carlos.dls')
             ->setEmail('infodanceschool@gmail.com')
             ->setName('Carlos')
             ->setLastname('DlS')
             ->setGender('m')
             ->setPassword($this->generatePassword($user))
             ->addRole(User::ROLE_SUPER_ADMIN)
             ->setPhone($faker->phoneNumber);

        $teacher = new Teacher();
        $teacher->setUser($user);
        $teacher->setWage(0);
        $teacher->setComment('Owner');

        $this->manager->persist($teacher);

        for ($i = 1; $i <= self::MAX_TEACHERS; ++$i) {
            $user = new User();

            $user
                ->setUsername($faker->userName)
                ->setEmail($faker->email)
                ->setPassword($this->generatePassword($user))
                ->addRole(User::ROLE_DEFAULT);

            $user
                ->setName($faker->name)
                ->setLastname($faker->lastName)
                ->setGender('m')
                ->setPhone($faker->phoneNumber)
                ->setIdentityNumber($faker->unique()->randomDigit)
                ->setAddress($faker->address)
                ->setCity($faker->city)
                ->setCountry($faker->countryCode)
                ->setPostalCode($faker->postcode);

            $teacher = new Teacher();
            $teacher->setUser($user);
            $teacher->setWage(60.00);
            $teacher->setComment($faker->text(50));

            $this->manager->persist($teacher);
        }

        $this->manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
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
