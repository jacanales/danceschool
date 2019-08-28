<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Repository;

use App\School\Domain\Entity\Course;
use App\School\Domain\Entity\Group;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    /**
     * @param $id
     */
    public function findWithGroups(int $id): Course
    {
        /**
         * @var Course
         */
        $course = $this->find($id);

        $groups = $this
            ->getEntityManager()
            ->getRepository(Group::class)
            ->findBy(['course' => $id]);

        $course->setGroups($groups);

        return $course;
    }
}