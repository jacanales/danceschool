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
            ':Teacher:index.html.twig',
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
            ':Teacher:show.html.twig',
            [
                'teacher' => $teacher,
            ]
        );
    }

    /**
     * @Route("/add", name="danceschool_teacher_add")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addAction(Request $request): Response
    {
        $form = $this->createForm(TeacherType::class, new Teacher());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_teacher_index');
        }

        return $this->render(
            ':Teacher:add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="danceschool_teacher_edit")
     *
     * @param Request $request
     * @param         $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \LogicException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function editAction(Request $request, int $id): Response
    {
        $em      = $this->getDoctrine()->getManager();
        $teacher = $em->getRepository(Teacher::class)->find($id);

        $form = $this->createForm(TeacherType::class, $teacher, ['edit' => true]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$teacher) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_teacher_index');
        }

        return $this->render(
            ':Teacher:edit.html.twig',
            [
                'form'    => $form->createView(),
                'teacher' => $teacher,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="danceschool_teacher_remove")
     *
     * @param int $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function removeAction(int $id): Response
    {
        $em      = $this->getDoctrine()->getManager();
        $teacher = $em->getRepository(Teacher::class)->find($id);

        if (!$teacher) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($teacher);
        $em->flush();

        return $this->redirectToRoute('danceschool_teacher_index');
    }
}
