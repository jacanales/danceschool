<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class Builder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root', [
            'navbar'     => true,
            'pull-right' => false,
        ]);

        // Add a regular child with an icon, icon- is prepended automatically
        $menu->addChild('title.home', [
            'icon'  => 'home',
            'route' => 'homepage',
        ])->setExtra('translation_domain', 'messages');


        $this->addRoomMenu($menu);
        $this->addCourseMenu($menu);
        $this->addTeacherMenu($menu);
        $this->addStudentMenu($menu);
        $this->addGroupMenu($menu);

        return $menu;
    }

    private function addRoomMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $room = $menu->addChild('title.room', [
            'dropdown' => true,
            'caret'    => true,
        ]);

        // Create a dropdown header
        $room->addChild('title.rooms', ['dropdown-header' => true]);
        $room->addChild('title.list_rooms', ['route' => 'danceschool_room_index', 'dropdown-header' => false]);
    }

    private function addCourseMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $course = $menu->addChild('title.course', [
            'dropdown' => true,
            'caret'    => true,
        ]);

        // Create a dropdown header
        $course->addChild('title.courses', ['dropdown-header' => true]);
        $course->addChild('title.list_courses', ['route' => 'danceschool_course_index', 'dropdown-header' => false]);
    }

    private function addTeacherMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $teacher = $menu->addChild('title.teacher', [
            'dropdown' => true,
            'caret'    => true,
        ]);

        // Create a dropdown header
        $teacher->addChild('title.teachers', ['dropdown-header' => true]);
        $teacher->addChild('title.list_teachers', ['route' => 'danceschool_teacher_index', 'dropdown-header' => false]);
    }

    private function addStudentMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $student = $menu->addChild('title.student', [
            'dropdown' => true,
            'caret'    => true,
        ]);

        // Create a dropdown header
        $student->addChild('title.students', ['dropdown-header' => true]);
        $student->addChild('title.list_students', ['route' => 'danceschool_student_index', 'dropdown-header' => false]);
        $student->addChild('title.add_student', ['route' => 'danceschool_student_add', 'dropdown-header' => false]);
    }

    private function addGroupMenu(ItemInterface $menu): void
    {
        $group = $menu->addChild('title.group', [
            'dropdown' => true,
            'caret'    => true,
        ]);

        // Create a dropdown header
        $group->addChild('title.groups', ['dropdown-header' => true]);
        $group->addChild('title.list_groups', ['route' => 'danceschool_group_index', 'dropdown-header' => false]);
        $group->addChild('title.add_group', ['route' => 'danceschool_group_add', 'dropdown-header' => false]);
    }

    public function invalidMethod(): \stdClass
    {
        return new \stdClass();
    }
}
