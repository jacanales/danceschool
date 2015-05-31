<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group object
 *
 * @ORM\Entity
 * @ORM\Table(name="group_students")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class GroupStudent
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="groupStudent")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=false)
     */
    protected $group;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="groupStudent")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id", nullable=false)
     */
    protected $student;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=false, options={"default"=false})
     */
    protected $is_reinforcing;
}
