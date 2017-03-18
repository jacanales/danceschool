<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    private $edit;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', UserType::class, [])
            ->add('captation_method', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'form.choose_captation',
                'choices' => [
                    'form.captation.recommended',
                    'form.captation.offer',
                    'form.captation.other',
                ],
                'label' => 'form.label.captation_method',
                'translation_domain' => 'AppBundle'
            ])
            ->add('member', null, [
                'label' => 'form.label.member',
                'translation_domain' => 'AppBundle'
            ])
            ->add('contract_expiration', null, [
                'label' => 'form.label.contract_expiration',
                'translation_domain' => 'AppBundle'
            ])
            ->add('comment', null, [
                'label' => 'form.label.comment',
                'translation_domain' => 'AppBundle'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'form.label.save',
                'translation_domain' => 'AppBundle'
            ])
            ->getForm();
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Student'
        ));
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
        return 'appbundle_student';
    }
}
