<?php

declare(strict_types=1);

namespace Zonadev\BootstrapBundle\Bootstrap\Infrastructure\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ButtonBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class FormActionsType.
 *
 * Adds support for form actions, printing buttons in a single line, and correctly offset.
 */
class FormActionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach ($options['buttons'] as $name => $config) {
            $this->createButton($builder, $name, $config);
        }
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated Remove it when bumping requirements to SF 2.7+
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'buttons'       => [],
            'options'       => [],
            'mapped'        => false,
            'button_offset' => null,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['button_offset'] = $options['button_offset'];
    }

    /**
     * {@inheritdoc}
     *
     * SF <2.8 BC
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'form_actions';
    }

    /**
     * Adds a button.
     *
     * @param FormBuilderInterface $builder
     * @param $name
     * @param $config
     *
     * @throws \InvalidArgumentException
     *
     * @return ButtonBuilder
     */
    protected function createButton($builder, $name, $config)
    {
        $options = (isset($config['options'])) ? $config['options'] : [];

        $builder->add($name, $config['type'], $options);

        return $builder;
    }
}
