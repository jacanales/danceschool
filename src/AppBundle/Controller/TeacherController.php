<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/add", name="mayimbe_teacher_add")
     */
    public function addAction()
    {
        return $this->render('default/index.html.twig');
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
