<?php

namespace spec\AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\ORM\LoadRoomData;
use PhpSpec\ObjectBehavior;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @mixin LoadRoomData
 */
class LoadRoomDataSpec extends ObjectBehavior
{
    public function let(ContainerInterface $container)
    {
        $this->setContainer($container);
    }
}