<?php

namespace App\Repository;

use App\Entity\Course;
use App\Entity\Group;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
         * @var $course Course
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
