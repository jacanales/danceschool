<?php

namespace spec\AppBundle\DependencyInjection;

use AppBundle\DependencyInjection\AppExtension;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @mixin AppExtension
 */
class AppExtensionSpec extends ObjectBehavior
{
    public function it_extends_extension()
    {
        $this->shouldBeAnInstanceOf(Extension::class);
    }
}
