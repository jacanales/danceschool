<?php

namespace AppBundle\Entity;

class GroupStudent
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Group
     */
    protected $group;

    /**
     * @var Student
     */
    protected $student;

    /**
     * @var bool
     */
    protected $is_reinforcing;

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
    }

    /**
     * @return Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param Student $student
     */
    public function setStudent(Student $student)
    {
        $this->student = $student;
    }

    /**
     * @return bool
     */
    public function isReinforcing()
    {
        return $this->is_reinforcing;
    }

    /**
     * @param bool $is_reinforcing
     */
    public function setIsReinforcing($is_reinforcing)
    {
        $this->is_reinforcing = (bool) $is_reinforcing;
    }
}
