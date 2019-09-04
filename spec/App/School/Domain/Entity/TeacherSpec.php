<?php

declare(strict_types=1);

namespace spec\App\School\Domain\Entity;

use App\School\Domain\Entity\Teacher;
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

    public function it_sets_wage(): void
    {
        $this->setWage(30.0)->shouldHaveType(Teacher::class);

        $this->getWage()->shouldReturn(30.0);
    }

    public function it_sets_comment(): void
    {
        $this->setComment('comment')->shouldHaveType(Teacher::class);

        $this->getComment()->shouldReturn('comment');
    }

    public function it_sets_user(): void
    {
        $user = new User();

        $this->setUser($user)->shouldHaveType(Teacher::class);

        $this->getUser()->shouldReturn($user);
    }

    public function it_returns_full_name(User $user): void
    {
        $user->getName()->shouldBeCalled()->willReturn('name');
        $user->getLastname()->shouldBeCalled()->willReturn('lastname');

        $this->setUser($user);

        $this->getFullName()->shouldReturn('name lastname');
    }
}
