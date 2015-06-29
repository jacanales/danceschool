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
        $numDays = range(date('N', strtotime("monday")), date('N', strtotime("sunday")));

        foreach ($numDays as $numDay)
        {
            $this->weekdays[$numDay] = 'date.weekday.' . $numDay;
        }

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