<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\Type\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches
 * @Route("/student")
 */
class StudentController extends Controller
{
    /**
     * @Route("/", name="mayimbe_student_index")
     */
    public function indexAction()
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $teachers = $this->getDoctrine()
                         ->getRepository('AppBundle:Student')
                         ->findAll();

        return $this->render(
            'AppBundle:student:index.html.twig',
            array('students' => $teachers)
        );
    }

    /**
     * @Route("/show/{id}", name="mayimbe_student_show")
     *
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $student = $this->getDoctrine()
                     ->getRepository('AppBundle:Student')
                     ->find($id);

        if (!$student) {
            throw $this->createNotFoundException(
                'No student found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Student:show.html.twig',
            array(
                'student' => $student,
            )
        );
    }

    /**
     * @Route("/add", name="mayimbe_student_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new StudentType(), new Student());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_teacher_index');
        }

        return $this->render(
            'AppBundle:Student:add.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/edit/{id}", name="mayimbe_student_edit")
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:Student')->find($id);

        $form = $this->createForm(new StudentType(true), $student);

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$student) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_student_index');
        }

        return $this->render(
            'AppBundle:Student:edit.html.twig',
            array(
                'form' => $form->createView(),
                'student' => $student,
            )
        );
    }

    /**
     * @Route("/remove/{id}", name="mayimbe_student_remove")
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:Student')->find($id);

        if (!$student) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute('mayimbe_student_index');
    }

    /**
     * @Route("/{studentId}/annotations", name="mayimbe_student_annotations_remove")
     */
    public function indexAnnotationsAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/{studentId}/annotations/add", name="mayimbe_student_annotation_add")
     */
    public function addAnnotationAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/{studentId}/annotations/edit", name="mayimbe_student_annotation_edit")
     */
    public function editAnnotationAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/{studentId}/annotations/remove", name="mayimbe_student_annotation_remove")
     */
    public function removeAnnotationAction()
    {
        return $this->render('default/index.html.twig');
    }
}
