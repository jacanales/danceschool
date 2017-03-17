<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
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
        $this->addUser('admin', 'admin@zonadev.es', User::ROLE_SUPER_ADMIN);
        $this->addUser('jcanales', 'tanque.tm@gmail.com', User::ROLE_SUPER_ADMIN);
        $manager->flush();
    }

    private function addUser($userName, $email, $role = User::ROLE_DEFAULT)
    {
        $user = $this->manager->getRepository('AppBundle:User')->findOneByEmail($email);

        if ($user) {
            return;
        }

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();

        $user->setUsername($userName)
            ->setPlainPassword($this->generatePassword())
            ->setEmail($email)
            ->setEnabled(true)
            ->addRole($role);

        $userManager->updateUser($user, true);
//        $this->manager->persist($user);
    }

    private function generatePassword()
    {
        return substr(str_shuffle(sha1(microtime())), 0, 20);
    }
}
