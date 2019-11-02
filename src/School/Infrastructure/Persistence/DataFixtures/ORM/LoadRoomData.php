<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\School\Domain\Model\Room;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use libphonenumber\PhoneNumberUtil;

class LoadRoomData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

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

    public function getOrder(): int
    {
        return 3;
    }

    private function addRoom(
        string $name,
        string $description,
        int $price = 0,
        string $address = '',
        string $city = '',
        string $postal_code = '',
        string $phone = null
    ): void {
        $room = new Room();

        $room->setName($name)
            ->setDescription($description)
            ->setPrice($price)
            ->setAddress($address)
            ->setCity($city)
            ->setPostalCode($postal_code);

        if ($phone) {
            $phoneNumber = PhoneNumberUtil::getInstance()->parse($phone, PhoneNumberUtil::UNKNOWN_REGION);
            $room->setPhone($phoneNumber);
        }

        $this->manager->persist($room);
    }
}
