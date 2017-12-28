<?php

namespace App\Repository;

use App\Entity\Course;
use App\Entity\Group;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    /**
     * @param $id
     *
     * @return Course
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
