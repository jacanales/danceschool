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
            ':Room:index.html.twig',
            ['rooms' => $rooms]
        );
    }

    /**
     * @Route("/add", name="danceschool_room_add")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addAction(Request $request): Response
    {
        $form = $this->createForm(RoomType::class, new Room(), [
            'show_legend'        => true,
            'label'              => 'title.add_room',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_room_index');
        }

        return $this->render(
            ':Room:add.html.twig',
            [
                'form' => $form->createView(),
            ]
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
            ':Room:show.html.twig',
            [
                'room' => $room,
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="danceschool_room_edit")
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function editAction(Request $request, int $id): Response
    {
        $em   = $this->getDoctrine()->getManager();
        $room = $em->getRepository(Room::class)->find($id);

        $form = $this->createForm(RoomType::class, $room, [
            'show_legend'        => true,
            'label'              => 'title.edit_room',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$room) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_room_index');
        }

        return $this->render(
            ':Room:edit.html.twig',
            [
                'form' => $form->createView(),
                'room' => $room,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="danceschool_room_remove")
     *
     * @param int $id
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function removeAction($id): Response
    {
        $em   = $this->getDoctrine()->getManager();
        $room = $em->getRepository(Room::class)->find($id);

        if (!$room) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($room);
        $em->flush();

        return $this->redirectToRoute('danceschool_room_index');
    }
}
