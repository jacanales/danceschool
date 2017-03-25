<?php

namespace spec\AppBundle\Repository;

use AppBundle\Entity\Course;
use AppBundle\Entity\Group;
use AppBundle\Repository\CourseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use PhpSpec\ObjectBehavior;

/**
 * @mixin CourseRepository
 */
class CourseRepositorySpec extends ObjectBehavior
{
    public function let(EntityManagerInterface $entityManager, ClassMetadata $metadata)
    {
        $this->beConstructedWith($entityManager, $metadata);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CourseRepository::class);
    }

    public function it_returns_hydrated_course_with_groups(
        EntityManagerInterface $entityManager,
        EntityRepository $entityRepository
    ) {
        $course = new Course();
        $group  = new Group();

        $entityManager->find(null, 1, null, null)->shouldBeCalled()->willReturn($course);

        $entityRepository->findBy(['course' => 1])->shouldBeCalled()->willReturn([$group]);
        $entityManager->getRepository('AppBundle:Group')->willReturn($entityRepository);

        $course = $this->findWithGroups(1);

        $course->getGroups()->shouldBeLike([$group]);
        $course->getGroups()->shouldHaveCount(1);
    }
}
