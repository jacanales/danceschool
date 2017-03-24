<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Course;
use AppBundle\Form\Type\CourseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/course")
 */
class CourseController extends Controller
{
    /**
     * @Route("/", name="mayimbe_course_index")
     */
    public function indexAction()
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
     * @Route("/show/{id}", name="mayimbe_course_show")
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $course = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Course')
            ->find($id);

        $groups = $course->getGroups();

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
     * @Route("/add", name="mayimbe_course_add")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $translator = $this->get('translator');

        $form = $this->createForm(CourseType::class, new Course(), [
            'label' => $translator->trans('title.add_course', [], 'AppBundle', 'es'),
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_course_index');
        }

        return $this->render(
            'AppBundle:Course:add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="mayimbe_course_edit")
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $translator = $this->get('translator');

        $em     = $this->getDoctrine()->getManager();
        $course = $em->getRepository('AppBundle:Course')->find($id);

        $form = $this->createForm(CourseType::class, $course, [
            'label' => $translator->trans('title.edit_course', [], 'AppBundle', 'es'),
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$course) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_course_index');
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
     * @Route("/remove/{id}", name="mayimbe_course_remove")
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function removeAction($id)
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

        return $this->redirectToRoute('mayimbe_course_index');
    }
}
