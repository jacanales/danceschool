<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Teacher;
use AppBundle\Form\Type\TeacherType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches
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
            'AppBundle:teacher:index.html.twig',
            array('teachers' => $teachers)
        );
    }

    /**
     * @Route("/show/{id}", name="mayimbe_teacher_show")
     *
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $room = $this->getDoctrine()
                     ->getRepository('AppBundle:Teacher')
                     ->find($id);

        if (!$room) {
            throw $this->createNotFoundException(
                'No room found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Teacher:show.html.twig',
            array(
                'teacher' => $room,
            )
        );
    }

    /**
     * @Route("/add", name="mayimbe_teacher_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new TeacherType(), new Teacher());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_teacher_index');
        }

        return $this->render(
            'AppBundle:Teacher:add.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/edit", name="mayimbe_teacher_edit")
     */
    public function editAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/remove", name="mayimbe_teacher_remove")
     */
    public function removeAction()
    {
        return $this->render('default/index.html.twig');
    }
}
