<?php

declare(strict_types=1);

namespace spec\App\School\Domain\Model;

use App\School\Domain\Model\Student;
use App\School\Domain\Model\StudentAnnotation;
use App\Security\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;

class StudentSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Student::class);
    }

    public function it_sets_id(): void
    {
        $this->setId(1)->shouldHaveType(Student::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_user(): void
    {
        $user = new User();

        $this->setUser($user)->shouldHaveType(Student::class);

        $this->getUser()->shouldReturn($user);
    }

    public function it_adds_annotation(): void
    {
        $annotation = new StudentAnnotation();

        $this->addAnnotation($annotation)->shouldHaveType(Student::class);

        $this->getAnnotations()->shouldHaveType(ArrayCollection::class);
        $annotations = $this->getAnnotations();

        $annotations->toArray()->shouldReturn([$annotation]);
    }

    public function it_removes_annotation(): void
    {
        $annotation = new StudentAnnotation();

        $this->addAnnotation($annotation)->shouldHaveType(Student::class);

        $this->getAnnotations()->shouldHaveType(ArrayCollection::class);
        $annotations = $this->getAnnotations();

        $annotations->toArray()->shouldReturn([$annotation]);

        $this->removeAnnotation($annotation);

        $annotations->toArray()->shouldReturn([]);
    }
}
