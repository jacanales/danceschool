<?php

namespace spec\App\School\UI\Http\Controller;

use App\School\Domain\Entity\Room;
use App\School\UI\Http\Controller\RoomController;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use PhpSpec\ObjectBehavior;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class RoomControllerSpec extends ObjectBehavior
{
    public function let(
        ContainerInterface $container,
        ManagerRegistry $registry,
        ObjectManager $manager,
        ObjectRepository $repository,
        EngineInterface $templating
    ): void {
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

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(RoomController::class);
        $this->shouldBeAnInstanceOf(AbstractController::class);
    }

    public function it_render_index(): void
    {
        $this->index()->shouldHaveType(Response::class);
    }
}
