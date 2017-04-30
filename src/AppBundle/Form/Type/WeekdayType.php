<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeekdayType extends AbstractType
{
    private $weekdays;

    public function __construct()
    {
        $numDays = range(date('N', strtotime('monday')), date('N', strtotime('sunday')));

        foreach ($numDays as $numDay) {
            $this->weekdays['date.weekday.' . $numDay] = $numDay;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices'           => $this->weekdays,
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix(): string
    {
        return 'weekday';
    }
}
