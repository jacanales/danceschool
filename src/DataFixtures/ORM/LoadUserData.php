<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
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
        $this->addUser('admin', 'admin@zonadev.es', User::ROLE_SUPER_ADMIN, 'admin');
        $this->addUser('user', 'user@zonadev.es', User::ROLE_DEFAULT, 'user');
        $manager->flush();
    }

    private function addUser(string $userName, string $email, string $role = User::ROLE_DEFAULT, string $password = null): void
    {
        $user = $this->manager->getRepository('AppBundle:User')->findOneByEmail($email);

        if ($user) {
            return;
        }

        $userManager = $this->container->get('fos_user.user_manager');
        $user        = $userManager->createUser();

        $user->setUsername($userName)
            ->setPlainPassword($this->generatePassword($password))
            ->setEmail($email)
            ->setEnabled(true)
            ->addRole($role);

        $userManager->updateUser($user, true);
    }

    private function generatePassword(string $password = null): string
    {
        if ($password) {
            return $password;
        }

        return substr(str_shuffle(sha1(microtime())), 0, 20);
    }

    public function getOrder(): int
    {
        return 1;
    }
}