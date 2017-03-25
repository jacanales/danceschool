<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Room;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Room
 */
class RoomSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Room::class);
    }

    public function it_sets_id()
    {
        $this->setId(1)->shouldHaveType(Room::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_name()
    {
        $this->setName('name')->shouldHaveType(Room::class);

        $this->getName()->shouldReturn('name');
    }

    public function it_sets_description()
    {
        $this->setDescription('description')->shouldHaveType(Room::class);

        $this->getDescription()->shouldReturn('description');
    }

    public function it_sets_price()
    {
        $this->setPrice(4.3)->shouldHaveType(Room::class);

        $this->getPrice()->shouldReturn(4.3);
    }

    public function it_sets_address()
    {
        $this->setAddress('address')->shouldHaveType(Room::class);

        $this->getAddress()->shouldReturn('address');
    }

    public function it_sets_city()
    {
        $this->setCity('city')->shouldHaveType(Room::class);

        $this->getCity()->shouldReturn('city');
    }

    public function it_sets_postcode()
    {
        $this->setPostalCode('postcode')->shouldHaveType(Room::class);

        $this->getPostalCode()->shouldReturn('postcode');
    }

    public function it_sets_phone()
    {
        $this->setPhone('phone')->shouldHaveType(Room::class);

        $this->getPhone()->shouldReturn('phone');
    }
}
