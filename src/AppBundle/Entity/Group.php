<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group object.
 *
 * @ORM\Entity
 * @ORM\Table(name="groups")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Group
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Course
     *
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="group")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", nullable=false)
     */
    protected $course;

    /**
     * @var Room
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="group")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id", nullable=false)
     */
    protected $room;

    /**
     * @var Teacher
     *
     * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="groups")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id", nullable=false)
     */
    protected $teacher;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $weekday;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="time", nullable=false)
     */
    protected $hour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=false)
     */
    protected $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=false)
     */
    protected $endDate;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, options={"default"=null})
     */
    protected $whatsappGroup;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="GroupStudent", mappedBy="group")
     */
    protected $groupStudent;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="GroupStudent", mappedBy="group")
     */
    protected $student;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->groupStudent = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Group
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate->getTimestamp();

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        $datetime = new \DateTime();
        $datetime->setTimestamp($this->startDate);

        return $datetime;
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
