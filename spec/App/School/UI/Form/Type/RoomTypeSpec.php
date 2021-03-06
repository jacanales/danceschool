<?php

declare(strict_types=1);

namespace spec\App\School\UI\Form\Type;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormTypeInterface;

class RoomTypeSpec extends ObjectBehavior
{
    public function it_extends_abstract_type(): void
    {
        $this->shouldBeAnInstanceOf(AbstractType::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(FormTypeInterface::class);
    }
}
