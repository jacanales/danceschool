<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('captation_method')
            ->add('member')
            ->add('contract_expiration')
            ->add('comment')
            ->add('save', 'submit', array('label' => 'Create Student'))
            ->getForm();
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
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
