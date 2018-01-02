<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\Type\TeacherType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/teacher")
 */
class TeacherController extends Controller
{
    /**
     * @Route("/", name="danceschool_teacher_index")
     *
     * @throws \LogicException
     */
    public function indexAction(): Response
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
    public function showAction(int $id): Response
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
