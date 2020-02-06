<?php

declare(strict_types=1);

namespace App\School\UI\Http\Controller;

use App\School\Domain\Model\Room;
use Doctrine\ORM\EntityManager;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Route prefix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/room")
 */
class RoomController extends AbstractController
{
    /**
     * @Route("/", name="danceschool_room_index")
     *
     * @throws LogicException
     */
    public function index(): Response
    {
        /**
         * @var EntityManager
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
     * @throws NotFoundHttpException
     * @throws LogicException
     */
    public function show(int $id): Response
    {
        $room = $this->getDoctrine()
                     ->getRepository(Room::class)
                     ->find($id);

        if (!$room) {
            throw $this->createNotFoundException('No room found for id ' . $id);
        }

        return $this->render(
            'Room/show.html.twig',
            [
                'room' => $room,
            ]
        );
    }
}
