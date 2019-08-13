<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Form\DataTransformer\WeekdayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeekdayType extends AbstractType
{
    private $weekdays;

    /**
     * @var WeekdayTransformer
     */
    private $transformer;

    public function __construct(WeekdayTransformer $transformer)
    {
        $this->transformer = $transformer;

        $numDays = \range(\date('N', \strtotime('monday')), \date('N', \strtotime('sunday')));

        foreach ($numDays as $numDay) {
            $this->weekdays['date.weekday.' . $numDay] = $numDay;
        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => $this->weekdays,
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }

    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix(): string
    {
        return 'weekday';
    }
}
