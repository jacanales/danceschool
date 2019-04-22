<?php

namespace spec\App\Entity;

use App\Entity\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(User::class);
    }
}
