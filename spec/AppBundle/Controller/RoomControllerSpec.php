<?php

namespace spec\AppBundle\Controller;

use AppBundle\Controller\RoomController;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
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

    function it_is_of_type_container_aware() {
        $this->shouldBeAnInstanceOf(ContainerAwareInterface::class);
    }

    function it_should_respond_to_index_action(
        ObjectRepository $repository,
        EngineInterface $templating,
        Response $mockResponse
    ) {
        $templating
            ->renderResponse(
                'AppBundle:Room:index.html.twig',
                ['rooms' => []],
                null
            )
            ->willReturn($mockResponse)
        ;

        $repository->findAll()->willReturn([]);

        $response = $this->indexAction();

        $response->shouldHaveType(Response::class);
    }
}