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
     * @ORM\Column(type="boolean", nullable=true, options={"default"=false})
     */
    protected $is_reinforcing;

    /**
     * @return int
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param int $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return int
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param int $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }

    /**
     * @return boolean
     */
    public function isIsReinforcing()
    {
        return $this->is_reinforcing;
    }

    /**
     * @param boolean $is_reinforcing
     */
    public function setIsReinforcing($is_reinforcing)
    {
        $this->is_reinforcing = $is_reinforcing;
    }
}
