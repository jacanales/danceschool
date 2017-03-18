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
}
