<?php

namespace spec\App\Form\Type;

use App\Form\Type\RoomType;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @mixin RoomType
 */
class RoomTypeSpec extends ObjectBehavior
{
    public function it_extends_abstract_type()
    {
        $this->shouldBeAnInstanceOf(AbstractType::class);
    }

    public function it_should_implement_interface()
    {
        $this->shouldImplement(FormTypeInterface::class);
    }
}
