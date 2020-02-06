<?php

declare(strict_types=1);

namespace spec\App\School\UI\Http\Controller;

use App\School\UI\Http\Controller\RoomController;
use PhpSpec\ObjectBehavior;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoomControllerSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(RoomController::class);
        $this->shouldBeAnInstanceOf(AbstractController::class);
    }
}
