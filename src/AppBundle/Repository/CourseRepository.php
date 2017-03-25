<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Course;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    public function findWithGroups($id)
    {
        /**
         * @var Course $course
         */
        $course = $this->find($id);

        $groups = $this
            ->getEntityManager()
            ->getRepository('AppBundle:Group')
            ->findBy(['course' => $id]);

        $course->setGroups($groups);

        return $course;
    }
}
