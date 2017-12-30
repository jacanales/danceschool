<?php

namespace App\DataFixtures\ORM;

use App\Entity\Room;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadRoomData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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

        $this->addRoom(
            'Salamandra',
            'Marta: 625 740 882\n
                Xavier: 615 199 363\n
                Email: info@lasalamandra.net\n
                Web: http://lasalamandra.net/',
            0,
            'Carrer Burgos, 55, interior 3ª',
            'Barcelona',
            '08014',
            '+34934224642'
        );

        $this->addRoom(
            'Poble Espanyol',
            'Web: https://www.poble-espanyol.com/es',
            0,
            'Avda. Francesc Ferrer i Guardia, 13',
            'Barcelona',
            '08038',
            '+34935086300'
        );

        $this->manager->flush();
    }

    private function addRoom(
        string $name,
        string $description,
        int $price = 0,
        string $address = null,
        string $city = null,
        string $postal_code = null,
        string $phone = null
    ): void {
        $room = new Room();

        $phoneNumber = PhoneNumberUtil::getInstance()->parse($phone, PhoneNumberUtil::UNKNOWN_REGION);

        $room->setName($name)
            ->setDescription($description)
            ->setPrice($price)
            ->setAddress($address)
            ->setCity($city)
            ->setPostalCode($postal_code)
            ->setPhone($phoneNumber);

        $this->manager->persist($room);
    }

    public function getOrder(): int
    {
        return 3;
    }
}
