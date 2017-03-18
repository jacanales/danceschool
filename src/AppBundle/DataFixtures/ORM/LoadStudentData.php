<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Student;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadStudentData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    const MAX_STUDENTS = 20;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= self::MAX_STUDENTS; ++$i) {
            $user = new User();

            $user
                ->setUsername($faker->userName)
                ->setEmail($faker->email)
                ->setPassword($this->generatePassword($user))
                ->addRole(User::ROLE_DEFAULT);

            $user
                ->setName($faker->name)
                ->setSurname($faker->lastName)
                ->setGender('m')
                ->setPhone($faker->phoneNumber)
                ->setIdentityNumber($faker->randomNumber(8))
                ->setAddress($faker->address)
                ->setCity($faker->city)
                ->setCountry($faker->countryCode)
                ->setPostalCode($faker->postcode)
            ;

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

    private function generatePassword(User $user)
    {
        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        $password = substr(str_shuffle(sha1(microtime())), 0, 20);

        return $encoder->encodePassword($password, $user->getSalt());
    }

    public function getOrder()
    {
        return 5;
    }
}