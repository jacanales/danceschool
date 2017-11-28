<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Group;
use AppBundle\Entity\GroupStudent;
use AppBundle\Form\Type\GroupStudentType;
use AppBundle\Form\Type\GroupType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/group")
 */
class GroupController extends Controller
{
    /**
     * @Route("/", name="danceschool_group_index")
     *
     * @throws \LogicException
     */
    public function indexAction(): Response
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $groups = $this->getDoctrine()
                      ->getRepository('AppBundle:Group')
                      ->findAll();

        return $this->render(
            'AppBundle:Group:index.html.twig',
            ['groups' => $groups]
        );
    }

    /**
     * @Route("/show/{id}", name="danceschool_group_show")
     *
     * @param $id
     *
     * @return Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \UnexpectedValueException
     * @throws \LogicException
     */
    public function showAction(int $id): Response
    {
        $group = $this->getDoctrine()
                     ->getRepository('AppBundle:Group')
                     ->find($id);

        $students = $this->getDoctrine()
            ->getRepository('AppBundle:GroupStudent')
            ->findBy([
                'group' => $id,
            ]);

        if (!$group) {
            throw $this->createNotFoundException(
                'No room found for id ' . $id
            );
        }

        return $this->render(
            'AppBundle:Group:show.html.twig',
            [
                'group'    => $group,
                'students' => $students,
            ]
        );
    }

    /**
     * @Route("/add", name="danceschool_group_add")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addAction(Request $request): Response
    {
        $form = $this->createForm(GroupType::class, new Group(), [
            'show_legend'        => true,
            'label'              => 'title.add_group',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_group_index');
        }

        return $this->render(
            'AppBundle:Group:add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="danceschool_group_edit")
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
        $em    = $this->getDoctrine()->getManager();
        $group = $em->getRepository('AppBundle:Group')->find($id);

        $form = $this->createForm(GroupType::class, $group, [
            'show_legend'        => true,
            'label'              => 'title.edit_group',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$group) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_group_index');
        }

        return $this->render(
            'AppBundle:Group:edit.html.twig',
            [
                'form'  => $form->createView(),
                'group' => $group,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="danceschool_group_remove")
     *
     * @param int $id
     *
     * @return RedirectResponse
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function removeAction(int $id): RedirectResponse
    {
        $em    = $this->getDoctrine()->getManager();
        $group = $em->getRepository('AppBundle:Group')->find($id);

        if (!$group) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $em->remove($group);
        $em->flush();

        return $this->redirectToRoute('danceschool_group_index');
    }

    /**
     * @Route("/{id}/student/add", name="danceschool_group_add_student")
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function addStudentAction(Request $request, int $id): Response
    {
        $form = $this->createForm(GroupStudentType::class, new GroupStudent(), [
            'show_legend'        => true,
            'label'              => 'title.add_student',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em    = $this->getDoctrine()->getManager();
            $group = $em->getRepository('AppBundle:Group')->find($id);

            $formData = $form->getData();

            $formData->setGroup($group);

            $em->persist($formData);
            $em->flush();

            return $this->redirectToRoute('danceschool_group_show', ['id' => $id]);
        }

        return $this->render(
            'AppBundle:Group:add_student.html.twig',
            [
                'form' => $form->createView(),
                'id'   => $id,
            ]
        );
    }

    /**
     * @Route("/{id}/student/edit/{studentId}", name="danceschool_group_edit_student")
     *
     * @param Request $request
     * @param int     $id
     * @param int     $studentId
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function editStudentAction(Request $request, int $id, int $studentId): Response
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:GroupStudent')->findOneBy([
            'group'   => $id,
            'student' => $studentId,
        ]);

        $form = $this->createForm(GroupStudentType::class, $student, [
            'show_legend'        => true,
            'label'              => 'title.edit_group',
            'translation_domain' => 'AppBundle',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$student) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_group_show', ['id' => $id]);
        }

        return $this->render(
            'AppBundle:Group:edit_student.html.twig',
            [
                'form'    => $form->createView(),
                'student' => $student,
                'id'      => $id,
            ]
        );
    }

    /**
     * @Route("/{id}/student/remove/{studentId}", name="danceschool_group_remove_student")
     *
     * @param int $id
     * @param int $studentId
     *
     * @return RedirectResponse
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function removeStudentAction(int $id, int $studentId): RedirectResponse
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:GroupStudent')->findOneBy([
            'group'   => $id,
            'student' => $studentId,
        ]);

        if (!$student) {
            throw $this->createNotFoundException(
                'No product found for id ' . $studentId
            );
        }

        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute('danceschool_group_show', ['id' => $id]);
    }
}
