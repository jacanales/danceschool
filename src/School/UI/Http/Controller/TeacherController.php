<?php

namespace App\School\UI\Http\Controller;

use App\School\Domain\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/teacher")
 */
class TeacherController extends AbstractController
{
    /**
     * @Route("/", name="danceschool_teacher_index")
     *
     * @throws \LogicException
     */
    public function index(): Response
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $teachers = $this->getDoctrine()
                      ->getRepository(Teacher::class)
                      ->findAll();

        return $this->render(
            'Teacher/index.html.twig',
            ['teachers' => $teachers]
        );
    }

    /**
     * @Route("/show/{id}", name="danceschool_teacher_show")
     *
     * @param int $id
     *
     * @return Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function show(int $id): Response
    {
        $teacher = $this->getDoctrine()
                     ->getRepository(Teacher::class)
                     ->find($id);

        if (!$teacher) {
            throw $this->createNotFoundException(
                'No teacher found for id ' . $id
            );
        }

        return $this->render(
            'Teacher/show.html.twig',
            [
                'teacher' => $teacher,
            ]
        );
    }
}
