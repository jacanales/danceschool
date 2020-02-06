<?php

declare(strict_types=1);

namespace App\School\UI\Form\Type;

use App\School\Domain\Model\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface<FormBuilderInterface> $builder
     * @param array<string>                              $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', UserType::class, ['edit' => $options['edit']])
            ->add('captation_method', ChoiceType::class, [
                'required'    => false,
                'placeholder' => 'form.choose_captation',
                'choices'     => [
                    'form.captation.recommended' => 0,
                    'form.captation.offer'       => 1,
                    'form.captation.other'       => 2,
                ],
                'label' => 'form.label.captation_method',
            ])
            ->add('member', null, [
                'label' => 'form.label.member',
            ])
            ->add('contract_expiration', DateType::class, [
                'label'       => 'form.label.contract_expiration',
                'widget'      => 'single_text',
                'placeholder' => 'DD/MM/YYYY',
            ])
            ->add('comment', TextareaType::class, [
                'label'    => 'form.label.comment',
                'required' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'form.label.save',
            ])
            ->getForm();
    }

    /**
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
            'edit'       => false,
        ]);
    }

    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix(): string
    {
        return 'student';
    }
}
