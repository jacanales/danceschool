<?php

namespace Tests\AppBundle\DependencyInjection;

use AppBundle\DependencyInjection\AppExtension;
use AppBundle\Form\Type\GenderType;
use AppBundle\Form\Type\WeekdayType;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class AppExtensionTest extends AbstractExtensionTestCase
{
    public function test_form_types_are_loaded()
    {
        $this->load([]);

        $this->assertContainerBuilderHasService(
            'app.form.type.gender',
            GenderType::class
        );

        $this->assertContainerBuilderHasService(
            'app.form.type.weekday',
            WeekdayType::class
        );
    }

    /**
     * Return an array of container extensions you need to be registered for each test (usually just the container
     * extension you are testing.
     *
     * @return ExtensionInterface[]
     */
    protected function getContainerExtensions()
    {
        return [
            new AppExtension(),
        ];
    }
}
