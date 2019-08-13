<?php

declare(strict_types=1);

namespace spec\App\DataFixtures\ORM;

use PhpSpec\ObjectBehavior;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadRoomDataSpec extends ObjectBehavior
{
    public function let(ContainerInterface $container): void
    {
        $this->setContainer($container);
    }
}
