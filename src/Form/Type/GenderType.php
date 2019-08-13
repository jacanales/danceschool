<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenderType extends AbstractType
{
    private $genders;

    public function __construct()
    {
        $this->genders = [
            'form.gender.male'   => 'm',
            'form.gender.female' => 'f',
        ];
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => $this->genders,
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
        return 'gender';
    }
}
