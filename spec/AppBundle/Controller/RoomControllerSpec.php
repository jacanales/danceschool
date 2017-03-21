<?php

namespace spec\AppBundle\Controller;

use AppBundle\Controller\RoomController;
use AppBundle\Entity\Room;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
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
            ->getRepository(Argument::exact('AppBundle:Room'))
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

    public function it_should_respond_to_index_action(
        ObjectRepository $repository,
        EngineInterface $templating,
        Response $mockResponse
    ) {
        $templating
            ->renderResponse(
                Argument::exact('AppBundle:Room:index.html.twig'),
                ['rooms' => []],
                null
            )
            ->willReturn($mockResponse)
        ;

        $repository->findAll()->willReturn([]);

        $response = $this->indexAction();

        $response->getStatusCode()->shouldBe(Response::HTTP_OK);
        $response->shouldHaveType(Response::class);
    }

    public function it_should_list_objects_in_index_action(
        EntityManager $entityManager,
        ObjectRepository $repository,
        EngineInterface $templating,
        Response $mockResponse,
        Room $room
    ) {
        $entityManager->getRepository(Argument::exact('AppBundle:Room'))->willReturn($repository);
        $repository->findAll()->willReturn([$room]);

        $templating
            ->renderResponse(
                Argument::exact('AppBundle:Room:index.html.twig'),
                ['rooms' => [$room]],
                null
            )
            ->willReturn($mockResponse)
        ;

        $response = $this->indexAction();

        $response->shouldHaveType(Response::class);
    }
}
