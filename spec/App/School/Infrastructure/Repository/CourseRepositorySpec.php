<?php

declare(strict_types=1);

namespace spec\App\School\Infrastructure\Repository;

use App\School\Domain\Model\Course;
use App\School\Domain\Model\Group;
use App\School\Infrastructure\Repository\CourseRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CourseRepositorySpec extends ObjectBehavior
{
    public function let(EntityManager $entityManager, ClassMetadata $metadata): void
    {
        $this->beConstructedWith($entityManager, $metadata);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CourseRepository::class);
    }

    public function it_returns_hydrated_course_with_groups(
        EntityManager $entityManager,
        EntityRepository $entityRepository
    ): void {
        $course = new Course();
        $group  = new Group();

        $entityManager->find(Argument::any(), 1, null, null)->shouldBeCalled()->willReturn($course);

        $entityRepository->findBy(['course' => 1])->shouldBeCalled()->willReturn([$group]);
        $entityManager->getRepository(Group::class)->willReturn($entityRepository);

        $course = $this->findWithGroups(1);

        $course->getGroups()->shouldBeLike([$group]);
        $course->getGroups()->shouldHaveCount(1);
    }
}
