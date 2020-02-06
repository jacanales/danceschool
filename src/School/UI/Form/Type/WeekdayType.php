<?php

declare(strict_types=1);

namespace App\School\UI\Form\Type;

use App\School\UI\Form\DataTransformer\WeekdayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeekdayType extends AbstractType
{
    /** @var array<string, float|int> */
    private array $weekdays;
    private WeekdayTransformer $transformer;

    public function __construct(WeekdayTransformer $transformer)
    {
        $this->transformer = $transformer;

        $numDays = \range(\date('N', (int) \strtotime('monday')), \date('N', (int) \strtotime('sunday')));

        foreach ($numDays as $numDay) {
            $this->weekdays['date.weekday.' . $numDay] = $numDay;
        }
    }

    /**
     * @param FormBuilderInterface<FormBuilderInterface> $builder
     * @param array<string>                              $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
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
