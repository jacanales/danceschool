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
    protected $course;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="groups")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id", nullable=false)
     */
    protected $room;

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
}
