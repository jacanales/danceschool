<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Group;
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
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/add", name="mayimbe_group_add")
     */
    public function addAction(Request $request)
    {
        $translator = $this->get('translator');

        $form = $this->createForm(new GroupType(), new Group(), array(
            'show_legend' => true,
            'label' => $translator->trans('title.add_group', array(), 'AppBundle', 'es')
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_group_index');
        }

        return $this->render(
            'AppBundle:Group:add.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/edit", name="mayimbe_group_edit")
     */
    public function editAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/remove", name="mayimbe_group_remove")
     */
    public function removeAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/add", name="mayimbe_group_add_student")
     */
    public function addStudentAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/edit", name="mayimbe_group_edit_student")
     */
    public function editStudentAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/remove", name="mayimbe_group_remove_student")
     */
    public function removeStudentAction()
    {
        return $this->render('default/index.html.twig');
    }
}
