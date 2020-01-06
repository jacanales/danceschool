<?php

declare(strict_types=1);

/*
 * This file is part of the MopaBootstrapBundle.
 *
 * (c) Philipp A. Mohrenweiser <phiamo@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zonadev\BootstrapBundle\Bootstrap\Infrastructure\Menu\Factory;

use Knp\Menu\Factory\ExtensionInterface;

/**
 * Extension for integrating Bootstrap Menus into KnpMenu.
 */
class MenuExtension extends MenuDecorator implements ExtensionInterface
{
}
