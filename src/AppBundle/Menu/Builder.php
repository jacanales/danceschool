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

        return $menu;
    }

    private function addRoomMenu(ItemInterface &$menu)
    {
        // Create a dropdown with a caret
        $room = $menu->addChild('Room', array(
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $room->addChild('Rooms', array('dropdown-header' => true));
        $room->addChild('View rooms', array('route' => 'mayimbe_room_index', 'dropdown-header' => false));
        $room->addChild('Add room', array('route' => 'mayimbe_room_add', 'dropdown-header' => false));
    }

    public function invalidMethod(FactoryInterface $factory)
    {
        return new \stdClass();
    }
}
