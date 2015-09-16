<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    private $manager;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->addUser('jcanales', 'tanque.tm@gmail.com', User::ROLE_SUPER_ADMIN);
        $manager->flush();
    }

    private function addUser($userName, $email, $role = User::ROLE_DEFAULT)
    {
        $user = $this->manager->getRepository('AppBundle:User')->findOneByEmail($email);

        if ($user) {
            return;
        }

        $user = new User();
        $user->setUsername($userName)
            ->setPassword($this->generatePassword())
            ->setEmail($email)
            ->setEnabled(true)
            ->addRole(User::ROLE_SUPER_ADMIN);

        $this->manager->persist($user);
    }

    private function generatePassword()
    {
        return substr(str_shuffle(sha1(microtime())), 0, 20);
    }
}
