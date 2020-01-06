<?php

declare(strict_types=1);

namespace tests\Zonadev\BootstrapBundle\Bootstrap\Infrastructure\Form;

class SimpleDivLayoutTest extends AbstractDivLayoutTest
{
    public function testHorizontalRow()
    {
        $view = $this->factory
            ->createNamed('name', $this->getFormType('email'), null, [
                'layout' => 'horizontal',
            ])
            ->createView();

        $html = $this->renderRow($view);

        $this->assertMatchesXpath(
            $html,
            '/div[@class="form-group"]
    [
        ./label[@for="name"][@class="control-label col-sm-3 required"]
        /following-sibling::div[@class="col-sm-9"]
    ]
'
        );
    }

    public function testInlineRow()
    {
        $view = $this->factory
            ->createNamed('name', $this->getFormType('text'), null, [
                'horizontal' => false,
            ])
            ->createView();

        $html = $this->renderRow($view);

        $this->assertMatchesXpath(
            $html,
            '
/div[@class="form-group"]
    [
        ./label[@for="name"][@class="required"]
        /following-sibling::input[@type="text"][@id="name"][@name="name"][@required="required"]
    ]
'
        );
    }
}
