<?php

declare(strict_types=1);

namespace App\School\UI\Http\Controller;

use App\School\Domain\Model\Course;
use App\School\Infrastructure\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/course")
 */
class CourseController extends AbstractController
{
    /**
     * @Route("/", name="danceschool_course_index")
     *
     * @throws \LogicException
     */
    public function index(): Response
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
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function show(int $id): Response
    {
        /** @var CourseRepository $repository */
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
