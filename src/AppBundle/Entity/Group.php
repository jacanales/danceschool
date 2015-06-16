<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group object
 *
 * @ORM\Entity
 * @ORM\Table(name="groups")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Group
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="groups")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", nullable=false)
     */
    protected $courses;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="groups")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id", nullable=false)
     */
    protected $rooms;

    /**
     * @var integer
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
     * @var integer
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
    protected $start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=false)
     */
    protected $end_date;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, options={"default"=null})
     */
    protected $whatsapp_group;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="GroupStudent", mappedBy="group")
     */
    protected $groupStudent;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupStudent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set weekday
     *
     * @param integer $weekday
     *
     * @return Group
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
     * Get weekday
     *
     * @return integer
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * Set hour
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
     * Get hour
     *
     * @return \DateTime
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Group
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Group
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set whatsappGroup
     *
     * @param string $whatsappGroup
     *
     * @return Group
     */
    public function setWhatsappGroup($whatsappGroup)
    {
        $this->whatsapp_group = $whatsappGroup;

        return $this;
    }

    /**
     * Get whatsappGroup
     *
     * @return string
     */
    public function getWhatsappGroup()
    {
        return $this->whatsapp_group;
    }

    /**
     * Set courses
     *
     * @param \AppBundle\Entity\Course $courses
     *
     * @return Group
     */
    public function setCourses(\AppBundle\Entity\Course $courses)
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * Get courses
     *
     * @return \AppBundle\Entity\Course
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set rooms
     *
     * @param \AppBundle\Entity\Room $rooms
     *
     * @return Group
     */
    public function setRooms(\AppBundle\Entity\Room $rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set teacher
     *
     * @param \AppBundle\Entity\Teacher $teacher
     *
     * @return Group
     */
    public function setTeacher(\AppBundle\Entity\Teacher $teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \AppBundle\Entity\Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Add groupStudent
     *
     * @param \AppBundle\Entity\GroupStudent $groupStudent
     *
     * @return Group
     */
    public function addGroupStudent(\AppBundle\Entity\GroupStudent $groupStudent)
    {
        $this->groupStudent[] = $groupStudent;

        return $this;
    }

    /**
     * Remove groupStudent
     *
     * @param \AppBundle\Entity\GroupStudent $groupStudent
     */
    public function removeGroupStudent(\AppBundle\Entity\GroupStudent $groupStudent)
    {
        $this->groupStudent->removeElement($groupStudent);
    }

    /**
     * Get groupStudent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupStudent()
    {
        return $this->groupStudent;
    }
}
