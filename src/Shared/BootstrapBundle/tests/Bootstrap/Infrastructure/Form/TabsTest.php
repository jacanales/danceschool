<?php

declare(strict_types=1);

namespace tests\Zonadev\BootstrapBundle\Bootstrap\Infrastructure\Form;

class TabsTest extends AbstractDivLayoutTest
{
    public function testAsterisk()
    {
        $form = $this->factory->createNamedBuilder('form', $this->getFormType('form'));
        $tab  = $form->create('tab1', $this->getFormType('tab'));
        $tab->add('test1', $this->getFormType('text'));
        $form->add($tab);

        $view = $form->getForm()->createView();
        $html = $this->renderWidget($view);

        $this->assertMatchesXpath(
            $this->removeBreaks($html),
            '
/fieldset
[
    (
        ./ul[@class="tabs nav-tabs"]
        [
            ./li[@class="active"]
            [
                ./a[@data-toggle="tab"]
            ]
        ]
    )
    and
    (
        ./div[@class="tab-content"]
        [
            ./div[@class="tab-pane active"]
        ]
    )
]
'
        );
    }
}
