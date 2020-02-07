<?php

declare(strict_types=1);

namespace spec\App\School\Domain\Model;

use App\School\Domain\Model\Teacher;
use App\Security\Domain\Entity\User;
use PhpSpec\ObjectBehavior;

class TeacherSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Teacher::class);
    }

    public function it_sets_id(): void
    {
        $this->setId(1)->shouldHaveType(Teacher::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_user(): void
    {
        $user = new User();

        $this->setUser($user)->shouldHaveType(Teacher::class);

        $this->getUser()->shouldReturn($user);
    }
}
