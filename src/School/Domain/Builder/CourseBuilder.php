<?php

declare(strict_types=1);

namespace App\School\Domain\Builder;

use App\School\Domain\Model\Course;

class CourseBuilder
{
    private Course $course;

    public function __construct()
    {
        $this->course = new Course();
    }

    public function withName(string $name): self
    {
        $this->course->name = $name;

        return $this;
    }

    public function withPrice(float $price): self
    {
        $this->course->price = $price;

        return $this;
    }

    public function build(): Course
    {
        return $this->course;
    }
}
