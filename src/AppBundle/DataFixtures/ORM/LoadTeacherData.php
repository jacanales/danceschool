<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use AppBundle\Entity\Teacher;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadTeacherData implements FixtureInterface, ContainerAwareInterface
{
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

        $this->addTeacher(
            'sandra.serra',
            'infomayimbe@gmail.com',
            'Sandra',
            'Serra',
            'f',
            User::ROLE_SUPER_ADMIN
        );

        $this->addTeacher(
            'ivan.fernandez',
            'ivan@salsaescuela.com',
            'Iván',
            'Fernandez',
            'm'
        );

        $this->manager->flush();
    }

    private function addTeacher($userName, $email, $name, $surname, $gender, $role = User::ROLE_DEFAULT)
    {
        $user = new User();

        $teacher = $this->manager->getRepository('AppBundle:User')->findOneByEmail($email);

        if ($teacher) {
            return;
        }

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        $user->setUsername($userName)
            ->setEmail($email)
            ->setSurname($surname)
            ->setName($name)
            ->setGender($gender)
            ->setPassword($encoder->encodePassword($this->generatePassword(), $user->getSalt()))
            ->addRole($role);

        $teacher = new Teacher();
        $teacher->setUser($user);

        $this->manager->persist($teacher);
    }

    private function generatePassword()
    {
        return substr(str_shuffle(sha1(microtime())), 0, 20);
    }
}
