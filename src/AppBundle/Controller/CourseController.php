<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Course;
use AppBundle\Form\Type\CourseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches
 * @Route("/course")
 */
class CourseController extends Controller
{
    /**
     * @Route("/", name="mayimbe_course_index")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/add", name="mayimbe_course_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new CourseType(), new Course());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_course_index');
        }

        return $this->render(
            'AppBundle:Course:add.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/edit", name="mayimbe_course_edit")
     */
    public function editAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/remove", name="mayimbe_course_remove")
     */
    public function removeAction()
    {
        return $this->render('default/index.html.twig');
    }
}
