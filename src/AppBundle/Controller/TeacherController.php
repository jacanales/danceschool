<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Teacher;
use AppBundle\Form\Type\TeacherType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/teacher")
 */
class TeacherController extends Controller
{
    /**
     * @Route("/", name="mayimbe_teacher_index")
     */
    public function indexAction()
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $teachers = $this->getDoctrine()
                      ->getRepository('AppBundle:Teacher')
                      ->findAll();

        return $this->render(
            'AppBundle:Teacher:index.html.twig',
            ['teachers' => $teachers]
        );
    }

    /**
     * @Route("/show/{id}", name="mayimbe_teacher_show")
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $teacher = $this->getDoctrine()
                     ->getRepository('AppBundle:Teacher')
                     ->find($id);

        if (!$teacher) {
            throw $this->createNotFoundException(
                'No teacher found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Teacher:show.html.twig',
            [
                'teacher' => $teacher,
            ]
        );
    }

    /**
     * @Route("/add", name="mayimbe_teacher_add")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(TeacherType::class, new Teacher());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_teacher_index');
        }

        return $this->render(
            'AppBundle:Teacher:add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="mayimbe_teacher_edit")
     *
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $em      = $this->getDoctrine()->getManager();
        $teacher = $em->getRepository('AppBundle:Teacher')->find($id);

        $form = $this->createForm(TeacherType::class, $teacher, ['edit' => true]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$teacher) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_teacher_index');
        }

        return $this->render(
            'AppBundle:Teacher:edit.html.twig',
            [
                'form'    => $form->createView(),
                'teacher' => $teacher,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="mayimbe_teacher_remove")
     */
    public function removeAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $teacher = $em->getRepository('AppBundle:Teacher')->find($id);

        if (!$teacher) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($teacher);
        $em->flush();

        return $this->redirectToRoute('mayimbe_teacher_index');
    }
}
