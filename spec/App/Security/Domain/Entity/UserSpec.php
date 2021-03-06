<?php

declare(strict_types=1);

namespace spec\App\Security\Domain\Entity;

use App\Security\Domain\Entity\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(User::class);
    }
}
