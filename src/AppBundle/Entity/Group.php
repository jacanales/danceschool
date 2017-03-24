<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->groupStudent = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Group
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set weekday.
     *
     * @param int $weekday
     *
     * @return Group
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
     * Get weekday.
     *
     * @return int
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * Set hour.
     *
     * @param \DateTime $hour
     *
     * @return Group
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour.
     *
     * @return \DateTime
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate.
     *
     * @param \DateTime $endDate
     *
     * @return Group
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set whatsappGroup.
     *
     * @param string $whatsappGroup
     *
     * @return Group
     */
    public function setWhatsappGroup($whatsappGroup)
    {
        $this->whatsappGroup = $whatsappGroup;

        return $this;
    }

    /**
     * Get whatsappGroup.
     *
     * @return string
     */
    public function getWhatsappGroup()
    {
        return $this->whatsappGroup;
    }

    /**
     * Set course.
     *
     * @param Course $course
     *
     * @return Group
     */
    public function setCourse(Course $course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course.
     *
     * @return \AppBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set room.
     *
     * @param Room $room
     *
     * @return Group
     */
    public function setRoom(Room $room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room.
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set teacher.
     *
     * @param Teacher $teacher
     *
     * @return Group
     */
    public function setTeacher(Teacher $teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher.
     *
     * @return Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Add groupStudent.
     *
     * @param GroupStudent $groupStudent
     *
     * @return Group
     */
    public function addGroupStudent(GroupStudent $groupStudent)
    {
        $this->groupStudent[] = $groupStudent;

        return $this;
    }

    /**
     * Remove groupStudent.
     *
     * @param GroupStudent $groupStudent
     */
    public function removeGroupStudent(GroupStudent $groupStudent)
    {
        $this->groupStudent->removeElement($groupStudent);
    }

    /**
     * Get groupStudent.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupStudent()
    {
        return $this->groupStudent;
    }
}
