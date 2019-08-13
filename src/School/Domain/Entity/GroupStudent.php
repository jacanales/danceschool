<?php

namespace App\School\Domain\Entity;

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

    public function getGroup(): Group
    {
        return $this->group;
    }

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

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    public function isReinforcing(): bool
    {
        return $this->is_reinforcing ?? false;
    }

    public function setIsReinforcing(bool $is_reinforcing): void
    {
        \var_dump($is_reinforcing);
        $this->is_reinforcing = (bool) $is_reinforcing;
    }
}
