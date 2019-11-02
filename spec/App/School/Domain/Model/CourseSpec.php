<?php

declare(strict_types=1);

namespace spec\App\School\Domain\Model;

use App\School\Domain\Model\Course;
use App\School\Domain\Model\Group;
use PhpSpec\ObjectBehavior;

class CourseSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Course::class);
    }

    public function it_sets_id(): void
    {
        $this->setId(1)->shouldHaveType(Course::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_price(): void
    {
        $this->setPrice(1.1)->shouldHaveType(Course::class);

        $this->getPrice()->shouldReturn(1.1);
    }

    public function it_sets_groups(): void
    {
        $group = new Group();
        $this->setGroups([$group])->shouldHaveType(Course::class);

        $this->getGroups()->shouldReturn([$group]);
    }
}
