<?php

namespace spec\App\Entity;

use App\Entity\Course;
use App\Entity\Group;
use App\Entity\Room;
use App\Entity\Teacher;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Group
 */
class GroupSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Group::class);
    }

    public function it_sets_id()
    {
        $this->setId(1)->shouldHaveType(Group::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_name()
    {
        $this->setName('name')->shouldHaveType(Group::class);

        $this->getName()->shouldReturn('name');
    }

    public function it_sets_weekday()
    {
        $this->setWeekday(1)->shouldHaveType(Group::class);
        $this->getWeekday()->shouldReturn(1);
    }

    public function it_sets_hour()
    {
        $time = \DateTime::createFromFormat('H:i', '15:00');

        $this->setHour($time)->shouldHaveType(Group::class);

        $this->getHour()->shouldReturn($time);
        $this->getHour()->shouldHaveType(\DateTime::class);
    }

    public function it_sets_start_date()
    {
        $datetime = new \DateTime();

        $this->setStartDate($datetime)->shouldHaveType(Group::class);

        $this->getStartDate()->shouldReturn($datetime);
        $this->getStartDate($datetime)->shouldHaveType(\DateTime::class);
    }

    public function it_sets_end_date()
    {
        $datetime = new \DateTime();

        $this->setEndDate($datetime)->shouldHaveType(Group::class);

        $this->getEndDate()->shouldReturn($datetime);
        $this->getEndDate($datetime)->shouldHaveType(\DateTime::class);
    }

    public function it_sets_whatsapp_group()
    {
        $this->setWhatsappGroup('whatsapp')->shouldHaveType(Group::class);
        $this->getWhatsappGroup()->shouldReturn('whatsapp');
    }

    public function it_sets_course()
    {
        $course = new Course();

        $this->setCourse($course)->shouldHaveType(Group::class);

        $this->getCourse()->shouldReturn($course);
        $this->getCourse()->shouldHaveType(Course::class);
    }

    public function it_sets_room()
    {
        $course = new Room();

        $this->setRoom($course)->shouldHaveType(Group::class);

        $this->getRoom()->shouldReturn($course);
        $this->getRoom()->shouldHaveType(Room::class);
    }

    public function it_sets_teacher()
    {
        $course = new Teacher();

        $this->setTeacher($course)->shouldHaveType(Group::class);

        $this->getTeacher()->shouldReturn($course);
        $this->getTeacher()->shouldHaveType(Teacher::class);
    }

    public function it_adds_student()
    {
        $course = new Teacher();

        $this->setTeacher($course)->shouldHaveType(Group::class);

        $this->getTeacher()->shouldReturn($course);
        $this->getTeacher()->shouldHaveType(Teacher::class);
    }
}
