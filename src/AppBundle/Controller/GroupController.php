<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Group;
use AppBundle\Entity\GroupStudent;
use AppBundle\Form\Type\GroupStudentType;
use AppBundle\Form\Type\GroupType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches
 * @Route("/group")
 */
class GroupController extends Controller
{
    /**
     * @Route("/", name="mayimbe_group_index")
     */
    public function indexAction()
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $groups = $this->getDoctrine()
                      ->getRepository('AppBundle:Group')
                      ->findAll();

        return $this->render(
            'AppBundle:Group:index.html.twig',
            array('groups' => $groups)
        );
    }

    /**
     * @Route("/show/{id}", name="mayimbe_group_show")
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $group = $this->getDoctrine()
                     ->getRepository('AppBundle:Group')
                     ->find($id);

        $students = $this->getDoctrine()
            ->getRepository('AppBundle:GroupStudent')
            ->findBy(array(
                'group' => $id
            ));

        if (!$group) {
            throw $this->createNotFoundException(
                'No room found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Group:show.html.twig',
            array(
                'group' => $group,
                'students' => $students
            )
        );
    }

    /**
     * @Route("/add", name="mayimbe_group_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $translator = $this->get('translator');

        $form = $this->createForm(GroupType::class, new Group(), [
            'show_legend' => true,
            'label' => $translator->trans('title.add_group', [], 'AppBundle', 'es')
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_group_index');
        }

        return $this->render(
            'AppBundle:Group:add.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="mayimbe_group_edit")
     *
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $translator = $this->get('translator');

        $em = $this->getDoctrine()->getManager();
        $group = $em->getRepository('AppBundle:Group')->find($id);

        $form = $this->createForm(new GroupType(), $group, array(
            'show_legend' => true,
            'label' => $translator->trans('title.edit_group', [], 'AppBundle', 'es')
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$group) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_group_index');
        }

        return $this->render(
            'AppBundle:Group:edit.html.twig',
            [
                'form' => $form->createView(),
                'group' => $group,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="mayimbe_group_remove")
     *
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $group = $em->getRepository('AppBundle:Group')->find($id);

        if (!$group) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($group);
        $em->flush();

        return $this->redirectToRoute('mayimbe_group_index');
    }

    /**
     * @Route("/{id}/student/add", name="mayimbe_group_add_student")
     *
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addStudentAction(Request $request, $id)
    {
        $translator = $this->get('translator');

        $form = $this->createForm(GroupStudentType::class, new GroupStudent(), [
            'show_legend' => true,
            'label' => $translator->trans('title.add_student', [], 'AppBundle', 'es')
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $group = $em->getRepository('AppBundle:Group')->find($id);

            $form->getData()->setGroup($group);

            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_group_show', ['id' => $id]);
        }

        return $this->render(
            'AppBundle:Group:add_student.html.twig',
            [
                'form' => $form->createView(),
                'id' => $id
            ]
        );
    }

    /**
     * @Route("/{id}/student/edit/{studentId}", name="mayimbe_group_edit_student")
     *
     * @param Request $request
     * @param integer $id
     * @param integer $studentId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editStudentAction(Request $request, $id, $studentId)
    {
        $translator = $this->get('translator');

        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:GroupStudent')->findOneBy(array(
            'group' => $id,
            'student' => $studentId
        ));

        $form = $this->createForm(new GroupStudentType(), $student, array(
            'show_legend' => true,
            'label' => $translator->trans('title.edit_group', [], 'AppBundle', 'es')
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$student) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_group_show', array('id' => $id));
        }

        return $this->render(
            'AppBundle:Group:edit_student.html.twig',
            array(
                'form' => $form->createView(),
                'student' => $student,
                'id' => $id
            )
        );
    }

    /**
     * @Route("/{id}/student/remove/{studentId}", name="mayimbe_group_remove_student")
     *
     * @param integer $id
     * @param integer $studentId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeStudentAction($id, $studentId)
    {
        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:GroupStudent')->findOneBy(array(
            'group' => $id,
            'student' => $studentId
        ));

        if (!$student) {
            throw $this->createNotFoundException(
                'No product found for id ' . $studentId
            );
        }

        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute('mayimbe_group_show', array('id' => $id));
    }
}
