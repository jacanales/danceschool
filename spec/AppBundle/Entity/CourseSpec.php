<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Course;
use AppBundle\Entity\Group;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Course
 */
class CourseSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
    	$this->shouldHaveType(Course::class);
    }

    public function it_sets_id()
    {
        $this->setId(1)->shouldHaveType(Course::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_description()
    {
        $this->setDescription('description')->shouldHaveType(Course::class);

        $this->getDescription()->shouldReturn('description');
    }

    public function it_sets_price()
    {
        $this->setPrice(1.1)->shouldHaveType(Course::class);

        $this->getPrice()->shouldReturn(1.1);
    }

    public function it_sets_groups()
    {
        $group = new Group();
        $this->setGroups([$group])->shouldHaveType(Course::class);

        $this->getGroups()->shouldReturn([$group]);
    }
}
