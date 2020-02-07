<?php

declare(strict_types=1);

namespace App\School\Domain\Builder;

use App\School\Domain\Model\Course;
use App\School\Domain\Model\Group;
use App\School\Domain\Model\Room;
use App\School\Domain\Model\Teacher;

class GroupBuilder
{
    private Group $group;

    public function create(): self
    {
        $this->group = new Group();

        return $this;
    }

    public function withName(string $name): self
    {
        $this->group->name = $name;

        return $this;
    }

    public function withWeekday(int $weekDay): self
    {
        $this->group->weekday = $weekDay;

        return $this;
    }

    public function withHour(\DateTimeInterface $time): self
    {
        $this->group->hour = $time;

        return $this;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $this->group->startDate = $startDate;

        return $this;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $this->group->endDate = $endDate;

        return $this;
    }

    public function withWhatsAppGroup(string $group): self
    {
        $this->group->whatsAppGroup = $group;

        return $this;
    }

    public function withCourse(Course $course): self
    {
        $this->group->course = $course;

        return $this;
    }

    public function withTeacher(Teacher $teacher): self
    {
        $this->group->teacher = $teacher;

        return $this;
    }

    public function withRoom(Room $room): self
    {
        $this->group->room = $room;

        return $this;
    }

    public function build(): Group
    {
        return $this->group;
    }
}
