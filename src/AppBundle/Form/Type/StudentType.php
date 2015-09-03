<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    private $edit;

    /**
     * @param bool $edit
     */
    public function __construct($edit = false)
    {
        $this->edit = $edit;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', new UserType('AppBundle\Entity\User', $this->edit), array())
            ->add('captation_method', 'choice', array(
                'required' => false,
                'placeholder' => 'form.choose_captation',
                'choices' => array(
                    'form.captation.recommended',
                    'form.captation.offer',
                    'form.captation.other',
                ),
                'label' => 'form.label.captation_method',
                'translation_domain' => 'AppBundle'
            ))
            ->add('member', null, array(
                'label' => 'form.label.member',
                'translation_domain' => 'AppBundle'
            ))
            ->add('contract_expiration', null, array(
                'label' => 'form.label.contract_expiration',
                'translation_domain' => 'AppBundle'
            ))
            ->add('comment', null, array(
                'label' => 'form.label.comment',
                'translation_domain' => 'AppBundle'
            ))
            ->add('save', 'submit', array(
                'label' => 'form.label.save',
                'translation_domain' => 'AppBundle'
            ))
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
        return 'appbundle_student';
    }
}
