<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Group
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Course
     */
    protected $course;

    /**
     * @var Room
     */
    protected $room;

    /**
     * @var Teacher
     */
    protected $teacher;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $weekday;

    /**
     * @var \DateTime
     */
    protected $hour;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var string
     */
    protected $whatsappGroup;

    /**
     * @var int
     */
    protected $groupStudent;

    public function __construct()
    {
        $this->groupStudent = new ArrayCollection();
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return Group
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param int $weekday
     *
     * @return Group
     */
    public function setWeekday($weekday): self
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeekday(): ?int
    {
        return $this->weekday;
    }

    /**
     * @return string
     */
    public function getWeekdayText(): ?string
    {
        return date('l', strtotime("Sunday +{$this->getWeekday()} days"));
    }

    /**
     * @param \DateTime $hour
     *
     * @return Group
     */
    public function setHour($hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getHour(): ?\DateTime
    {
        return $this->hour;
    }

    /**
     * @param \DateTime $startDate
     *
     * @return self
     */
    public function setStartDate(\DateTime $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $endDate
     *
     * @return Group
     */
    public function setEndDate(\DateTime $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    /**
     * @param string $whatsappGroup
     *
     * @return Group
     */
    public function setWhatsappGroup(string $whatsappGroup): self
    {
        $this->whatsappGroup = $whatsappGroup;

        return $this;
    }

    /**
     * @return string
     */
    public function getWhatsappGroup(): ?string
    {
        return $this->whatsappGroup;
    }

    /**
     * @param Course $course
     *
     * @return Group
     */
    public function setCourse(Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    /**
     * @return Course
     */
    public function getCourse(): ?Course
    {
        return $this->course;
    }

    /**
     * @param Room $room
     *
     * @return Group
     */
    public function setRoom(Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return Room
     */
    public function getRoom(): ?Room
    {
        return $this->room;
    }

    /**
     * @param Teacher $teacher
     *
     * @return Group
     */
    public function setTeacher(Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * @return Teacher
     */
    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }
}
