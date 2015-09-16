<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Room;
use libphonenumber\PhoneNumberUtil;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadRoomData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    private $container;

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

    private function addRoom($name, $description, $price = 0, $address = null, $city = null, $postal_code = null, $phone = null)
    {
        $room = new Room();

        $room->setName($name)
            ->setDescription($description)
            ->setPrice($price)
            ->setAddress($address)
            ->setCity($city)
            ->setPostalCode($postal_code)
            ->setPhone($this->container->get('libphonenumber.phone_number_util')->parse($phone, PhoneNumberUtil::UNKNOWN_REGION));

        $this->manager->persist($room);
    }
}
