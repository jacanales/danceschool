<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Course;
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
}
