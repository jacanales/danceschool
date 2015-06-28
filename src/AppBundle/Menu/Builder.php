<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class Builder
{
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root', array(
            'navbar' => true,
            'pull-right' => false,
        ));

        // Add a regular child with an icon, icon- is prepended automatically
        $menu->addChild('title.home', array(
            'icon' => 'home',
            'route' => 'homepage',
        ))->setExtra('translation_domain', 'AppBundle');;

        $this->addRoomMenu($menu);
        $this->addCourseMenu($menu);
        $this->addTeacherMenu($menu);
        $this->addStudentMenu($menu);
        $this->addGroupMenu($menu);

        return $menu;
    }

    private function addRoomMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $room = $menu->addChild('title.room', array(
            'dropdown' => true,
            'caret' => true,
        ))->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $room->addChild('title.rooms', array('dropdown-header' => true))->setExtra('translation_domain', 'AppBundle');
        $room->addChild('title.list_rooms', array('route' => 'mayimbe_room_index', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
        $room->addChild('title.add_room', array('route' => 'mayimbe_room_add', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
    }

    private function addCourseMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $course = $menu->addChild('title.course', array(
            'dropdown' => true,
            'caret' => true,
        ))->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $course->addChild('title.courses', array('dropdown-header' => true))->setExtra('translation_domain', 'AppBundle');
        $course->addChild('title.list_courses', array('route' => 'mayimbe_course_index', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
        $course->addChild('title.add_course', array('route' => 'mayimbe_course_add', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
    }

    private function addTeacherMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $teacher = $menu->addChild('title.teacher', array(
            'dropdown' => true,
            'caret' => true,
        ))->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $teacher->addChild('title.teachers', array('dropdown-header' => true))->setExtra('translation_domain', 'AppBundle');
        $teacher->addChild('title.list_teachers', array('route' => 'mayimbe_teacher_index', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
        $teacher->addChild('title.add_teacher', array('route' => 'mayimbe_teacher_add', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
    }

    private function addStudentMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $student = $menu->addChild('title.student', array(
            'dropdown' => true,
            'caret' => true,
        ))->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $student->addChild('title.students', array('dropdown-header' => true))->setExtra('translation_domain', 'AppBundle');
        $student->addChild('title.list_students', array('route' => 'mayimbe_student_index', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
        $student->addChild('title.add_student', array('route' => 'mayimbe_student_add', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
    }

    private function addGroupMenu(ItemInterface &$menu)
    {
        $group = $menu->addChild('title.group', array(
            'dropdown' => true,
            'caret' => true,
        ))->setExtra('translation_domain', 'AppBundle');

        // Create a dropdown header
        $group->addChild('title.groups', array('dropdown-header' => true))->setExtra('translation_domain', 'AppBundle');
        $group->addChild('title.list_groups', array('route' => 'mayimbe_group_index', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
        $group->addChild('title.add_group', array('route' => 'mayimbe_group_add', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
    }

    public function invalidMethod(FactoryInterface $factory)
    {
        return new \stdClass();
    }
}
