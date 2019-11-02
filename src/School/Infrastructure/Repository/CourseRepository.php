<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Repository;

use App\School\Domain\Model\Course;
use App\School\Domain\Model\Group;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    public function findWithGroups(int $id): ?Course
    {
        $course = $this->find($id);

        if ($course instanceof Course) {
            /** @var Group[] $groups */
            $groups = $this
                ->getEntityManager()
                ->getRepository(Group::class)
                ->findBy(['course' => $id]);

            $course->setGroups($groups);

            return $course;
        }

        return null;
    }
}
