<?php

declare(strict_types=1);

namespace App\School\UI\Http\Controller;

use App\School\Domain\Model\Group;
use App\School\Domain\Model\GroupStudent;
use App\School\Domain\Model\Student;
use App\School\UI\Form\Type\GroupStudentType;
use App\School\UI\Form\Type\GroupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Route preffix affects only new (not overloaded) actions or if route name matches.
 *
 * @Route("/admin/group")
 */
class GroupController extends AbstractController
{
    private const ROUTE_GROUP_SHOW = 'danceschool_group_show';

    /**
     * @Route("/", name="danceschool_group_index")
     *
     * @throws \LogicException
     */
    public function index(): Response
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $groups = $this->getDoctrine()
                      ->getRepository(Group::class)
                      ->findAll();

        return $this->render(
            'Group/index.html.twig',
            [Group::JOIN_NAME => $groups]
        );
    }

    /**
     * @Route("/show/{id}", name="danceschool_group_show")
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \UnexpectedValueException
     * @throws \LogicException
     */
    public function show(int $id): Response
    {
        $group = $this->getDoctrine()
                     ->getRepository(Group::class)
                     ->find($id);

        $students = $this->getDoctrine()
            ->getRepository(GroupStudent::class)
            ->findBy([
                Group::NAME => $id,
            ]);

        if (!$group) {
            throw $this->createNotFoundException();
        }

        return $this->render(
            'Group/show.html.twig',
            [
                'group'    => $group,
                'students' => $students,
            ]
        );
    }

    /**
     * @Route("/add", name="danceschool_group_add")
     *
     * @throws \LogicException
     */
    public function add(Request $request): Response
    {
        $form = $this->createForm(GroupType::class, new Group(), [
            'show_legend' => true,
            'label'       => 'title.add_group',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('danceschool_group_index');
        }

        return $this->render(
            'Group/add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="danceschool_group_edit")
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function edit(Request $request, int $id): Response
    {
        $em    = $this->getDoctrine()->getManager();
        $group = $em->getRepository(Group::class)->find($id);

        $form = $this->createForm(GroupType::class, $group, [
            'show_legend' => true,
            'label'       => 'title.edit_group',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$group) {
                throw $this->createNotFoundException();
            }

            $em->flush();

            return $this->redirectToRoute('danceschool_group_index');
        }

        return $this->render(
            'Group/edit.html.twig',
            [
                'form'   => $form->createView(),
                'groups' => $group,
            ]
        );
    }

    /**
     * @Route("/remove/{id}", name="danceschool_group_remove")
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function remove(int $id): RedirectResponse
    {
        $em    = $this->getDoctrine()->getManager();
        $group = $em->getRepository(Group::class)->find($id);

        if (!$group) {
            throw $this->createNotFoundException();
        }

        $em->remove($group);
        $em->flush();

        return $this->redirectToRoute('danceschool_group_index');
    }

    /**
     * @Route("/{id}/student/add", name="danceschool_group_add_student")
     *
     * @throws \LogicException
     */
    public function addStudent(Request $request, int $id): Response
    {
        $form = $this->createForm(GroupStudentType::class, new GroupStudent(), [
            'show_legend' => true,
            'label'       => 'title.add_student',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em    = $this->getDoctrine()->getManager();
            $group = $em->getRepository(Group::class)->find($id);

            $formData = $form->getData();

            $formData->setGroup($group);

            $em->persist($formData);
            $em->flush();

            return $this->redirectToRoute(self::ROUTE_GROUP_SHOW, ['id' => $id]);
        }

        return $this->render(
            'Group/add_student.html.twig',
            [
                'form' => $form->createView(),
                'id'   => $id,
            ]
        );
    }

    /**
     * @Route("/{id}/student/edit/{studentId}", name="danceschool_group_edit_student")
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function editStudent(Request $request, int $id, int $studentId): Response
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository(GroupStudent::class)->findOneBy([
            Group::NAME   => $id,
            Student::NAME => $studentId,
        ]);

        $form = $this->createForm(GroupStudentType::class, $student, [
            'show_legend' => true,
            'label'       => 'title.edit_group',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$student) {
                throw $this->createNotFoundException();
            }

            $em->flush();

            return $this->redirectToRoute(self::ROUTE_GROUP_SHOW, ['id' => $id]);
        }

        return $this->render(
            'Group/edit_student.html.twig',
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
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function removeStudent(int $id, int $studentId): RedirectResponse
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository(GroupStudent::class)->findOneBy([
            Group::NAME   => $id,
            Student::NAME => $studentId,
        ]);

        if (!$student) {
            throw $this->createNotFoundException();
        }

        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute(self::ROUTE_GROUP_SHOW, ['id' => $id]);
    }
}
