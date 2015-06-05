<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/add", name="mayimbe_student_add")
     */
    public function addAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/edit", name="mayimbe_student_edit")
     */
    public function editAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/remove", name="mayimbe_student_remove")
     */
    public function removeAction()
    {
        return $this->render('default/index.html.twig');
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
