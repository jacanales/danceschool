<?php

declare(strict_types=1);

namespace spec\App\School\Domain\Entity;

use App\School\Domain\Entity\Room;
use libphonenumber\PhoneNumber;
use PhpSpec\ObjectBehavior;

class RoomSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Room::class);
    }

    public function it_sets_id(): void
    {
        $this->setId(1)->shouldHaveType(Room::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_name(): void
    {
        $this->setName('name')->shouldHaveType(Room::class);

        $this->getName()->shouldReturn('name');
    }

    public function it_sets_description(): void
    {
        $this->setDescription('description')->shouldHaveType(Room::class);

        $this->getDescription()->shouldReturn('description');
    }

    public function it_sets_price(): void
    {
        $this->setPrice(4.3)->shouldHaveType(Room::class);

        $this->getPrice()->shouldReturn(4.3);
    }

    public function it_sets_address(): void
    {
        $this->setAddress('address')->shouldHaveType(Room::class);

        $this->getAddress()->shouldReturn('address');
    }

    public function it_sets_city(): void
    {
        $this->setCity('city')->shouldHaveType(Room::class);

        $this->getCity()->shouldReturn('city');
    }

    public function it_sets_postcode(): void
    {
        $this->setPostalCode('postcode')->shouldHaveType(Room::class);

        $this->getPostalCode()->shouldReturn('postcode');
    }

    public function it_sets_phone(PhoneNumber $phoneNumber): void
    {
        $this->setPhone($phoneNumber)->shouldHaveType(Room::class);

        $this->getPhone()->shouldReturn($phoneNumber);
    }
}
