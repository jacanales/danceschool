<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\StudentAnnotation;
use App\Form\Type\StudentAnnotationType;
use App\Form\Type\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/student")
 */
class StudentController extends Controller
{
    /**
     * @Route("/", name="danceschool_student_index")
     * @Method("GET")
     *
     * @throws \LogicException
     */
    public function indexAction(): Response
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $students = $this->getDoctrine()
                         ->getRepository(Student::class)
                         ->findAll();

        return $this->render(
            ':Student:index.html.twig',
            ['students' => $students]
        );
    }

    /**
     * @Route("/show/{id}", name="danceschool_student_show")
     * @Method("GET")
     *
     * @param int $id
     *
     * @return Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \UnexpectedValueException
     * @throws \LogicException
     */
    public function showAction(int $id): Response
    {
        $student = $this->getDoctrine()
                     ->getRepository(Student::class)
                     ->find($id);

        $annotations = $this->getDoctrine()
            ->getRepository(StudentAnnotation::class)
            ->findBy([
                'student' => $id,
            ]);

        if (!$student) {
            throw $this->createNotFoundException(
                'No student found for id ' . $id
            );
        }

        return $this->render(
            ':Student:show.html.twig',
            [
                'student'     => $student,
                'annotations' => $annotations,
            ]
        );
    }

    /**
     * @Route("/add", name="danceschool_student_add")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addAction(Request $request): Response
    {
        $form = $this->createForm(StudentType::class, new Student());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_student_index');
        }

        return $this->render(
            ':Student:add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="danceschool_student_edit")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     * @param         $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function editAction(Request $request, int $id): Response
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository(Student::class)->find($id);

        $form = $this->createForm(StudentType::class, $student, ['edit' => true]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$student) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_student_index');
        }

        return $this->render(
            ':Student:edit.html.twig',
            [
                'form'    => $form->createView(),
                'student' => $student,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="danceschool_student_remove")
     * @Method({"GET", "POST"})
     *
     * @param $id
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
        $student = $em->getRepository(Student::class)->find($id);

        if (!$student) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute('danceschool_student_index');
    }

    /**
     * @Route("/{studentId}/annotations/add", name="danceschool_student_annotation_add")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     * @param         $studentId
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addAnnotationAction(Request $request, int $studentId): Response
    {
        $form = $this->createForm(StudentAnnotationType::class, new StudentAnnotation(), [
            'label'              => 'title.add_annotation',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em      = $this->getDoctrine()->getManager();
            $student = $em->getRepository(Student::class)->find($studentId);

            $form->getData()->setStudent($student);

            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_student_show', ['id' => $studentId]);
        }

        return $this->render(
            ':Student:add_annotation.html.twig',
            [
                'form'      => $form->createView(),
                'studentId' => $studentId,
            ]
        );
    }

    /**
     * @Route("/{studentId}/annotations/edit/{annotationId}", name="danceschool_student_annotation_edit")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     * @param int     $studentId
     * @param int     $annotationId
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function editAnnotationAction(Request $request, int $studentId, int $annotationId): Response
    {
        $em         = $this->getDoctrine()->getManager();
        $annotation = $em->getRepository(':StudentAnnotation')->find($annotationId);

        $form = $this->createForm(StudentAnnotationType::class, $annotation, [
            'label'              => 'title.edit_annotation',
            'translation_domain' => 'AppBundle',
            'edit'               => true,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$annotation) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $annotationId
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_student_show', ['id' => $studentId]);
        }

        return $this->render(
            ':Student:edit_annotation.html.twig',
            [
                'form'       => $form->createView(),
                'annotation' => $annotation,
                'studentId'  => $studentId,
            ]
        );
    }

    /**
     * @Route("/{studentId}/annotations/remove/{annotationId}", name="danceschool_student_annotation_remove")
     * @Method({"GET", "POST"})
     *
     * @param int $studentId
     * @param int $annotationId
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function removeAnnotationAction(int $studentId, int $annotationId): Response
    {
        $em         = $this->getDoctrine()->getManager();
        $annotation = $em->getRepository(StudentAnnotation::class)->find($annotationId);

        if (!$annotation) {
            throw $this->createNotFoundException(
                'No product found for id ' . $annotationId
            );
        }

        $em->remove($annotation);
        $em->flush();

        return $this->redirectToRoute('danceschool_student_show', ['id' => $studentId]);
    }
}
