<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeekdayType extends AbstractType
{
    private $weekdays;


    public function __construct()
    {
        $numDays = range(date('N', strtotime("monday")), date('N', strtotime("sunday")));

        foreach ($numDays as $numDay)
        {
            $this->weekdays['date.weekday.' . $numDay] = $numDay;
        }

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->weekdays,
            'choices_as_values' => true,
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
}