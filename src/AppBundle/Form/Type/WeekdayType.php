<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WeekdayType extends AbstractType
{
    private $weekdays;


    public function __construct()
    {
        $this->weekdays = array(
            1 => 'date.weekday.monday',
            2 => 'date.weekday.tuesday',
            3 => 'date.weekday.wednesday',
            4 => 'date.weekday.thursday',
            5 => 'date.weekday.friday',
            6 => 'date.weekday.saturday',
            0 => 'date.weekday.sunday'
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->weekdays
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'weekday';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }
}