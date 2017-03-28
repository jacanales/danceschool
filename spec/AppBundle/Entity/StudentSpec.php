<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Student;
use AppBundle\Entity\StudentAnnotation;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Student
 */
class StudentSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Student::class);
    }

    public function it_sets_id()
    {
        $this->setId(1)->shouldHaveType(Student::class);

        $this->getId()->shouldReturn(1);
    }

    public function it_sets_captation_method()
    {
        $this->setCaptationMethod(1)->shouldHaveType(Student::class);

        $this->getCaptationMethod()->shouldReturn(1);
    }

    public function it_sets_member()
    {
        $this->setMember(true)->shouldHaveType(Student::class);

        $this->getMember()->shouldReturn(true);
    }

    public function it_sets_contract_expiration()
    {
        $date = new \DateTime();

        $this->setContractExpiration($date)->shouldHaveType(Student::class);

        $this->getContractExpiration()->shouldReturn($date);
    }

    public function it_sets_comment()
    {
        $this->setComment('comment')->shouldHaveType(Student::class);

        $this->getComment()->shouldReturn('comment');
    }

    public function it_sets_user()
    {
        $user = new User();

        $this->setUser($user)->shouldHaveType(Student::class);

        $this->getUser()->shouldReturn($user);
    }

    public function it_adds_annotation()
    {
        $annotation = new StudentAnnotation();

        $this->addAnnotation($annotation)->shouldHaveType(Student::class);

        $this->getAnnotations()->shouldHaveType(ArrayCollection::class);
        $annotations = $this->getAnnotations();

        $annotations->toArray()->shouldReturn([$annotation]);
    }

    public function it_removes_annotation()
    {
        $annotation = new StudentAnnotation();

        $this->addAnnotation($annotation)->shouldHaveType(Student::class);

        $this->getAnnotations()->shouldHaveType(ArrayCollection::class);
        $annotations = $this->getAnnotations();

        $annotations->toArray()->shouldReturn([$annotation]);

        $this->removeAnnotation($annotation);

        $annotations->toArray()->shouldReturn([]);
    }

    public function it_sets_account_number()
    {
        $this->setAccountNumber('account_number')->shouldHaveType(Student::class);

        $this->getAccountNumber()->shouldReturn('account_number');
    }

    public function it_returns_full_name(User $user)
    {
        $user->getName()->shouldBeCalled()->willReturn('name');
        $user->getSurname()->shouldBeCalled()->willReturn('surname');

        $this->setUser($user);

        $this->getFullName()->shouldReturn('name surname');
    }
}
