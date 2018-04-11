<?php

namespace spec\App\Controller;

use App\Controller\RoomController;
use App\Entity\Room;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use PhpSpec\ObjectBehavior;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @mixin RoomController
 */
class RoomControllerSpec extends ObjectBehavior
{
    public function let(
        ContainerInterface $container,
        ManagerRegistry $registry,
        ObjectManager $manager,
        ObjectRepository $repository,
        EngineInterface $templating
    ) {
        $container->has('doctrine')->willReturn(true);
        $container->get('doctrine')->willReturn($registry);

        $container->has('templating')->willReturn(true);
        $container->get('templating')->willReturn($templating);

        $registry->getManager()->willReturn($manager);

        $registry
            ->getRepository(Room::class)
            ->willReturn($repository);

        $this->setContainer($container);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RoomController::class);
    }

    public function it_is_of_type_container_aware()
    {
        $this->shouldBeAnInstanceOf(ContainerAwareInterface::class);
    }

    public function it_render_index()
    {
        $this->indexAction()->shouldHaveType(Response::class);
    }
}
