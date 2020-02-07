<?php

declare(strict_types=1);

namespace App\School\Domain\Builder;

use App\School\Domain\Model\Teacher;
use App\Security\Domain\Entity\User;

class TeacherBuilder
{
    private Teacher $teacher;

    public function create(): self
    {
        $this->teacher = new Teacher();

        return $this;
    }

    public function withWage(float $wage): self
    {
        $this->teacher->wage = $wage;

        return $this;
    }

    public function withComment(string $comment): self
    {
        $this->teacher->comment = $comment;

        return $this;
    }

    public function withUser(User $user): self
    {
        $this->teacher->setUser($user);

        return $this;
    }

    public function build(): Teacher
    {
        return $this->teacher;
    }
}
