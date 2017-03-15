<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use AppBundle\Form\Type\RoomType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $rooms = $this->getDoctrine()
                      ->getRepository('AppBundle:Room')
                      ->findAll();

        return $this->render(
            'AppBundle:Room:index.html.twig',
            ['rooms' => $rooms]
        );
    }

    /**
     * @Route("/add", name="mayimbe_room_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $translator = $this->get('translator');

        $form = $this->createForm(RoomType::class, new Room(), [
            'show_legend' => true,
            'label' => $translator->trans('title.add_room', [], 'AppBundle', 'es')
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('mayimbe_room_index');
        }

        return $this->render(
            'AppBundle:Room:add.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/show/{id}", name="mayimbe_room_show")
     *
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $room = $this->getDoctrine()
                     ->getRepository('AppBundle:Room')
                     ->find($id);

        if (!$room) {
            throw $this->createNotFoundException(
                'No room found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Room:show.html.twig',
            [
                'room' => $room,
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="mayimbe_room_edit")
     *
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $translator = $this->get('translator');

        $em = $this->getDoctrine()->getManager();
        $room = $em->getRepository('AppBundle:Room')->find($id);

        $form = $this->createForm(new RoomType(), $room, [
            'show_legend' => true,
            'label' => $translator->trans('title.edit_room', [], 'AppBundle', 'es')
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$room) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }

            $em->flush();

            return $this->redirectToRoute('mayimbe_room_index');
        }

        return $this->render(
            'AppBundle:Room:edit.html.twig',
            [
                'form' => $form->createView(),
                'room' => $room,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="mayimbe_room_remove")
     *
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $room = $em->getRepository('AppBundle:Room')->find($id);

        if (!$room) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($room);
        $em->flush();

        return $this->redirectToRoute('mayimbe_room_index');
    }
}
