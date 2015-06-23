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
        $menu->addChild('Home', array(
            'icon' => 'home',
            'route' => 'homepage',
        ));

        $this->addRoomMenu($menu);
        $this->addCourseMenu($menu);
        $this->addTeacherMenu($menu);
        $this->addStudentMenu($menu);

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
        $room->addChild('title.rooms', array('dropdown-header' => true))->setExtra('translation_domain', 'AppBundle');;
        $room->addChild('title.list_rooms', array('route' => 'mayimbe_room_index', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
        $room->addChild('title.add_room', array('route' => 'mayimbe_room_add', 'dropdown-header' => false))->setExtra('translation_domain', 'AppBundle');
    }

    private function addCourseMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $course = $menu->addChild('Course', array(
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $course->addChild('Course', array('dropdown-header' => true));
        $course->addChild('View courses', array('route' => 'mayimbe_course_index', 'dropdown-header' => false));
        $course->addChild('Add course', array('route' => 'mayimbe_course_add', 'dropdown-header' => false));
    }

    private function addTeacherMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $teacher = $menu->addChild('Teacher', array(
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $teacher->addChild('Teacher', array('dropdown-header' => true));
        $teacher->addChild('View teachers', array('route' => 'mayimbe_teacher_index', 'dropdown-header' => false));
        $teacher->addChild('Add teacher', array('route' => 'mayimbe_teacher_add', 'dropdown-header' => false));
    }

    private function addStudentMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $teacher = $menu->addChild('Student', array(
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $teacher->addChild('Student', array('dropdown-header' => true));
        $teacher->addChild('View students', array('route' => 'mayimbe_student_index', 'dropdown-header' => false));
        $teacher->addChild('Add student', array('route' => 'mayimbe_student_add', 'dropdown-header' => false));
    }

    public function invalidMethod(FactoryInterface $factory)
    {
        return new \stdClass();
    }
}
