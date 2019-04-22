<?php

namespace spec\App\School\Domain\Entity;

use App\School\Domain\Entity\Course;
use App\School\Domain\Entity\Group;
use App\School\Domain\Entity\Room;
use App\School\Domain\Entity\Teacher;
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

    public function it_sets_name(): void
    {
        $this->setName('name')->shouldHaveType(Group::class);

        $this->getName()->shouldReturn('name');
    }

    public function it_sets_weekday(): void
    {
        $this->setWeekday(1)->shouldHaveType(Group::class);
        $this->getWeekday()->shouldReturn(1);
    }

    public function it_sets_hour(): void
    {
        $time = \DateTime::createFromFormat('H:i', '15:00');

        $this->setHour($time)->shouldHaveType(Group::class);

        $this->getHour()->shouldReturn($time);
        $this->getHour()->shouldHaveType(\DateTime::class);
    }

    public function it_sets_start_date(): void
    {
        $datetime = new \DateTime();

        $this->setStartDate($datetime)->shouldHaveType(Group::class);

        $this->getStartDate()->shouldReturn($datetime);
        $this->getStartDate()->shouldHaveType(\DateTime::class);
    }

    public function it_sets_end_date(): void
    {
        $datetime = new \DateTime();

        $this->setEndDate($datetime)->shouldHaveType(Group::class);

        $this->getEndDate()->shouldReturn($datetime);
        $this->getEndDate()->shouldHaveType(\DateTime::class);
    }

    public function it_sets_whatsapp_group(): void
    {
        $this->setWhatsappGroup('whatsapp')->shouldHaveType(Group::class);
        $this->getWhatsappGroup()->shouldReturn('whatsapp');
    }

    public function it_sets_course(): void
    {
        $course = new Course();

        $this->setCourse($course)->shouldHaveType(Group::class);

        $this->getCourse()->shouldReturn($course);
        $this->getCourse()->shouldHaveType(Course::class);
    }

    public function it_sets_room(): void
    {
        $course = new Room();

        $this->setRoom($course)->shouldHaveType(Group::class);

        $this->getRoom()->shouldReturn($course);
        $this->getRoom()->shouldHaveType(Room::class);
    }

    public function it_sets_teacher(): void
    {
        $course = new Teacher();

        $this->setTeacher($course)->shouldHaveType(Group::class);

        $this->getTeacher()->shouldReturn($course);
        $this->getTeacher()->shouldHaveType(Teacher::class);
    }
}
