<?php

namespace App\Controller;

use App\Entity\Room;
use App\Form\Type\RoomType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/", name="danceschool_room_index")
     *
     * @throws \LogicException
     */
    public function indexAction(): Response
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $rooms = $this->getDoctrine()
                      ->getRepository(Room::class)
                      ->findAll();

        return $this->render(
            'Room/index.html.twig',
            ['rooms' => $rooms]
        );
    }

    /**
     * @Route("/show/{id}", name="danceschool_room_show")
     *
     * @param int $id
     *
     * @return Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function showAction(int $id): Response
    {
        $room = $this->getDoctrine()
                     ->getRepository(Room::class)
                     ->find($id);

        if (!$room) {
            throw $this->createNotFoundException(
                'No room found for id ' . $id
            );
        }

        return $this->render(
            'Room/show.html.twig',
            [
                'room' => $room,
            ]
        );
    }
}
