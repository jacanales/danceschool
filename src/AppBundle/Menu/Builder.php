<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;

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
            'route' => '_welcome',
        ));

        // Create a dropdown with a caret
        $user = $menu->addChild('User', array(
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $user->addChild('Profile', array('dropdown-header' => true));
        $user->addChild('Show profile', array('route' => 'fos_user_profile_show', 'dropdown-header' => false));
        $user->addChild('Edit profile', array('route' => 'fos_user_profile_edit', 'dropdown-header' => false));

        return $menu;
    }

    public function invalidMethod(FactoryInterface $factory)
    {
        return new \stdClass();
    }
}
