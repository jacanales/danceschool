<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Teacher;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadTeacherData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    const MAX_TEACHERS = 5;

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
             ->setEmail('infomayimbe@gmail.com')
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
                ->setPostalCode($faker->postcode)
            ;

            $teacher = new Teacher();
            $teacher->setUser($user);
            $teacher->setWage(60.00);
            $teacher->setComment($faker->text(50));

            $this->manager->persist($teacher);
        }

        $this->manager->flush();
    }

    private function generatePassword(User $user): string
    {
        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        $password = substr(str_shuffle(sha1(microtime())), 0, 20);

        return $encoder->encodePassword($password, $user->getSalt());
    }

    public function getOrder(): int
    {
        return 2;
    }
}
