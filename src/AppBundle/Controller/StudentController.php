<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Entity\StudentAnnotation;
use AppBundle\Form\Type\StudentAnnotationType;
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
        $students = $this->getDoctrine()
                         ->getRepository('AppBundle:Student')
                         ->findAll();

        return $this->render(
            'AppBundle:student:index.html.twig',
            array('students' => $students)
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

        $annotations = $this->getDoctrine()
            ->getRepository('AppBundle:StudentAnnotation')
            ->findBy(array(
                'student' => $id
            ));

        if (!$student) {
            throw $this->createNotFoundException(
                'No student found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Student:show.html.twig',
            array(
                'student' => $student,
                'annotations' => $annotations
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

            return $this->redirectToRoute('mayimbe_student_index');
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
     * @Route("/{studentId}/annotations/add", name="mayimbe_student_annotation_add")
     *
     * @param Request $request
     * @param $studentId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAnnotationAction(Request $request, $studentId)
    {
        $translator = $this->get('translator');

        $form = $this->createForm(new StudentAnnotationType(), new StudentAnnotation(), array(
            'label' => $translator->trans('title.add_annotation', array(), 'AppBundle', 'es'),
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $student = $em->getRepository('AppBundle:Student')->find($studentId);

            $form->getData()->setStudent($student);

            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_student_show', array('id' => $studentId));
        }

        return $this->render(
            'AppBundle:Student:add_annotation.html.twig',
            array(
                'form' => $form->createView(),
                'studentId' => $studentId
            )
        );
    }

    /**
     * @Route("/{studentId}/annotations/edit/{annotationId}", name="mayimbe_student_annotation_edit")
     *
     * @param Request $request
     * @param integer $studentId
     * @param integer $annotationId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAnnotationAction(Request $request, $studentId, $annotationId)
    {
        $translator = $this->get('translator');

        $em = $this->getDoctrine()->getManager();
        $annotation = $em->getRepository('AppBundle:StudentAnnotation')->find($annotationId);

        $form = $this->createForm(new StudentAnnotationType(true), $annotation, array(
            'label' => $translator->trans('title.edit_annotation', array(), 'AppBundle', 'es'),
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$annotation) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $annotationId
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_student_annotations_index', array('studentId' => $studentId));
        }

        return $this->render(
            'AppBundle:Student:edit_annotation.html.twig',
            array(
                'form' => $form->createView(),
                'annotation' => $annotation,
                'studentId' => $studentId
            )
        );
    }

    /**
     * @Route("/{studentId}/annotations/remove/{annotationId}", name="mayimbe_student_annotation_remove")
     *
     * @param integer $studentId
     * @param integer $annotationId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAnnotationAction($studentId, $annotationId)
    {
        $em = $this->getDoctrine()->getManager();
        $annotation = $em->getRepository('AppBundle:StudentAnnotation')->find($annotationId);

        if (!$annotation) {
            throw $this->createNotFoundException(
                'No product found for id ' . $annotationId
            );
        }

        $em->remove($annotation);
        $em->flush();

        return $this->redirectToRoute('mayimbe_student_annotations_index', array('studentId' => $studentId));
    }
}
