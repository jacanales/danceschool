<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches
 * @Route("/room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/", name="mayimbe_room_index")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/add", name="mayimbe_room_add")
     */
    public function addAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/edit", name="mayimbe_room_edit")
     */
    public function editAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/remove", name="mayimbe_room_remove")
     */
    public function removeAction()
    {
        return $this->render('default/index.html.twig');
    }
}
