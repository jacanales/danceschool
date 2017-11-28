<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class Builder
{
    public function mainMenu(FactoryInterface $factory): ItemInterface
    {
        $menu = $factory->createItem('root', [
            'navbar'     => true,
            'pull-right' => false,
        ]);

        // Add a regular child with an icon, icon- is prepended automatically
        $menu->addChild('title.home', [
            'icon'  => 'home',
            'route' => 'homepage',
        ])->setExtra('translation_domain', 'AppBundle');

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
        ])->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $room->addChild('title.rooms', ['dropdown-header' => true])->setExtra('translation_domain', 'AppBundle');
        $room->addChild('title.list_rooms', ['route' => 'danceschool_room_index', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
        $room->addChild('title.add_room', ['route' => 'danceschool_room_add', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
    }

    private function addCourseMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $course = $menu->addChild('title.course', [
            'dropdown' => true,
            'caret'    => true,
        ])->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $course->addChild('title.courses', ['dropdown-header' => true])->setExtra('translation_domain', 'AppBundle');
        $course->addChild('title.list_courses', ['route' => 'danceschool_course_index', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
        $course->addChild('title.add_course', ['route' => 'danceschool_course_add', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
    }

    private function addTeacherMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $teacher = $menu->addChild('title.teacher', [
            'dropdown' => true,
            'caret'    => true,
        ])->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $teacher->addChild('title.teachers', ['dropdown-header' => true])->setExtra('translation_domain', 'AppBundle');
        $teacher->addChild('title.list_teachers', ['route' => 'danceschool_teacher_index', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
        $teacher->addChild('title.add_teacher', ['route' => 'danceschool_teacher_add', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
    }

    private function addStudentMenu(ItemInterface $menu): void
    {
        // Create a dropdown with a caret
        $student = $menu->addChild('title.student', [
            'dropdown' => true,
            'caret'    => true,
        ])->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $student->addChild('title.students', ['dropdown-header' => true])->setExtra('translation_domain', 'AppBundle');
        $student->addChild('title.list_students', ['route' => 'danceschool_student_index', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
        $student->addChild('title.add_student', ['route' => 'danceschool_student_add', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
    }

    private function addGroupMenu(ItemInterface $menu): void
    {
        $group = $menu->addChild('title.group', [
            'dropdown' => true,
            'caret'    => true,
        ])->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $group->addChild('title.groups', ['dropdown-header' => true])->setExtra('translation_domain', 'AppBundle');
        $group->addChild('title.list_groups', ['route' => 'danceschool_group_index', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
        $group->addChild('title.add_group', ['route' => 'danceschool_group_add', 'dropdown-header' => false])->setExtra('translation_domain', 'AppBundle');
    }

    public function invalidMethod(): \stdClass
    {
        return new \stdClass();
    }
}
