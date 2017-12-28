<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\Type\CourseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
            ->getRepository('AppBundle:Course')
            ->findAll();

        return $this->render(
            'AppBundle:Course:index.html.twig',
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
            ->getRepository('AppBundle:Course');

        $course = $repository
            ->findWithGroups($id);

        if (!$course) {
            throw $this->createNotFoundException(
                'No course found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Course:show.html.twig',
            [
                'course' => $course,
            ]
        );
    }

    /**
     * @Route("/add", name="danceschool_course_add")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addAction(Request $request): Response
    {
        $form = $this->createForm(CourseType::class, new Course(), [
            'label'              => 'title.add_course',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_course_index');
        }

        return $this->render(
            'AppBundle:Course:add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="danceschool_course_edit")
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function editAction(Request $request, int $id): Response
    {
        $em     = $this->getDoctrine()->getManager();
        $course = $em->getRepository('AppBundle:Course')->find($id);

        $form = $this->createForm(CourseType::class, $course, [
            'label'              => 'title.edit_course',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$course) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_course_index');
        }

        return $this->render(
            'AppBundle:Course:edit.html.twig',
            [
                'form'   => $form->createView(),
                'course' => $course,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="danceschool_course_remove")
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
        $em     = $this->getDoctrine()->getManager();
        $course = $em->getRepository('AppBundle:Course')->find($id);

        if (!$course) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($course);
        $em->flush();

        return $this->redirectToRoute('danceschool_course_index');
    }
}
