<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Student;
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
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
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
                'label'              => 'form.label.captation_method',
                'translation_domain' => 'AppBundle',
            ])
            ->add('member', null, [
                'label'              => 'form.label.member',
                'translation_domain' => 'AppBundle',
            ])
            ->add('contract_expiration', DateType::class, [
                'label'              => 'form.label.contract_expiration',
                'translation_domain' => 'AppBundle',
                'widget'             => 'single_text',
                'placeholder'        => 'DD/MM/YYYY',
            ])
            ->add('comment', TextareaType::class, [
                'label'              => 'form.label.comment',
                'translation_domain' => 'AppBundle',
            ])
            ->add('save', SubmitType::class, [
                'label'              => 'form.label.save',
                'translation_domain' => 'AppBundle',
            ])
            ->getForm();
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
            'edit'       => false,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'student';
    }
}
