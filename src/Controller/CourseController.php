<?php

namespace App\Controller;

use App\Entity\Course;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/course")
 */
class CourseController extends Controller
{
    /**
     * @Route("/", name="danceschool_course_index")
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function indexAction(): Response
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $rooms = $this
            ->getDoctrine()
            ->getRepository(Course::class)
            ->findAll();

        return $this->render(
            'Course/index.html.twig',
            ['courses' => $rooms]
        );
    }

    /**
     * @Route("/show/{id}", name="danceschool_course_show")
     *
     * @param int $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function showAction(int $id): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Course::class);

        $course = $repository
            ->findWithGroups($id);

        if (!$course) {
            throw $this->createNotFoundException(
                'No course found for id ' . $id
            );
        }

        return $this->render(
            'Course/show.html.twig',
            [
                'course' => $course,
            ]
        );
    }
}
