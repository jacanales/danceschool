<?php

declare(strict_types=1);

namespace App\School\Domain\Model;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Group
{
    public const NAME      = 'group';
    public const JOIN_NAME = 'groups';
    public Course $course;
    public Room $room;
    public Teacher $teacher;
    public string $name;
    public int $weekday;
    public DateTimeInterface $hour;
    public DateTimeInterface $startDate;
    public DateTimeInterface $endDate;
    public string $whatsAppGroup;
    /** @var Collection<int, GroupStudent> */
    public Collection $groupStudent;

    private int $id;

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

    public function getWeekdayText(): ?string
    {
        return \date('l', (int) \strtotime("Sunday +{$this->weekday} days"));
    }
}
