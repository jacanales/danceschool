<?php

namespace App\Entity;

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
    protected $is_reinforcing = false;

    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(Group $group): void
    {
        $this->group = $group;
    }

    /**
     * @return Student
     */
    public function getStudent(): ?Student
    {
        return $this->student;
    }

    /**
     * @param Student $student
     */
    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    /**
     * @return bool
     */
    public function isReinforcing(): bool
    {
        return $this->is_reinforcing ?? false;
    }

    /**
     * @param bool $is_reinforcing
     */
    public function setIsReinforcing(bool $is_reinforcing): void
    {
        var_dump($is_reinforcing);
        $this->is_reinforcing = (bool) $is_reinforcing;
    }
}