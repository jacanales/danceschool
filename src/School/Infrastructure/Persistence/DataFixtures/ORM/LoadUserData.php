<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\Security\Domain\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

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
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

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
        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }

    private function addUser(string $userName, string $email, string $role = User::ROLE_USER, string $password = null): void
    {
        $user = $this->manager->getRepository(User::class)->findOneByEmail($email);

        if ($user) {
            return;
        }

        $user = new User();

        $user->setUsername($userName)
            ->setPassword($this->generatePassword($user, $password))
            ->setEmail($email)
            ->addRole($role);

        $this->manager->persist($user);
        $this->manager->flush();
    }

    private function generatePassword(UserInterface $user, string $password = null): string
    {
        if (!$password) {
            $password = \mb_substr(\str_shuffle(\sha1(\microtime())), 0, 20);
        }

        return $this->passwordEncoder->encodePassword($user, $password);
    }
}
