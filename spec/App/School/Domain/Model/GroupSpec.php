<?php

declare(strict_types=1);

namespace spec\App\School\Domain\Model;

use App\School\Domain\Model\Group;
use PhpSpec\ObjectBehavior;

class GroupSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Group::class);
    }

    public function it_sets_id(): void
    {
        $this->setId(1)->shouldHaveType(Group::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_returns_weekday_text(): void
    {
        $this->weekday = 1;
        $this->getWeekdayText()->shouldReturn('Monday');
    }
}
