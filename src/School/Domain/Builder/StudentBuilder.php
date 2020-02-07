<?php

declare(strict_types=1);

namespace App\School\Domain\Builder;

use App\School\Domain\Model\Student;
use App\Security\Domain\Entity\User;

class StudentBuilder
{
    private Student $student;

    public function create(): self
    {
        $this->student = new Student();

        return $this;
    }

    public function withMembership(bool $isMember): self
    {
        $this->student->isMember = $isMember;

        return $this;
    }

    public function withComment(string $comment): self
    {
        $this->student->comment = $comment;

        return $this;
    }

    public function withUser(User $user): self
    {
        $this->student->setUser($user);

        return $this;
    }

    public function build(): Student
    {
        return $this->student;
    }
}
