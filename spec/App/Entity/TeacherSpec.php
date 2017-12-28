<?php

namespace spec\App\Entity;

use App\Entity\Teacher;
use App\Entity\User;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Teacher
 */
class TeacherSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Teacher::class);
    }

    public function it_sets_id()
    {
        $this->setId(1)->shouldHaveType(Teacher::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_wage()
    {
        $this->setWage(30.0)->shouldHaveType(Teacher::class);

        $this->getWage()->shouldReturn(30.0);
    }

    public function it_sets_comment()
    {
        $this->setComment('comment')->shouldHaveType(Teacher::class);

        $this->getComment()->shouldReturn('comment');
    }

    public function it_sets_user()
    {
        $user = new User();

        $this->setUser($user)->shouldHaveType(Teacher::class);

        $this->getUser()->shouldReturn($user);
    }

    public function it_returns_full_name(User $user)
    {
        $user->getName()->shouldBeCalled()->willReturn('name');
        $user->getLastname()->shouldBeCalled()->willReturn('lastname');

        $this->setUser($user);

        $this->getFullName()->shouldReturn('name lastname');
    }
}
