<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Group
{
    private int $id;
    private Course $course;
    private Room $room;
    private Teacher $teacher;
    private string $name;
    private int $weekday;
    private DateTimeInterface $hour;
    private DateTimeInterface $startDate;
    private DateTimeInterface $endDate;
    private string $whatsAppGroup;
    /** @var Collection<int, GroupStudent> */
    private Collection $groupStudent;

    public function __construct()
    {
        $this->groupStudent = new ArrayCollection();
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setWeekday(int $weekday): self
    {
        $this->weekday = $weekday;

        return $this;
    }

    public function getWeekday(): ?int
    {
        return $this->weekday;
    }

    public function getWeekdayText(): ?string
    {
        return \date('l', (int) \strtotime("Sunday +{$this->getWeekday()} days"));
    }

    public function setHour(DateTimeInterface $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function getHour(): ?DateTimeInterface
    {
        return $this->hour;
    }

    public function setStartDate(DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setEndDate(DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setWhatsAppGroup(string $whatsAppGroup): self
    {
        $this->whatsAppGroup = $whatsAppGroup;

        return $this;
    }

    public function getWhatsAppGroup(): ?string
    {
        return $this->whatsAppGroup;
    }

    public function setCourse(Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setRoom(Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setTeacher(Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }
}
