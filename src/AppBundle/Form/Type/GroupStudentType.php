<?php

namespace AppBundle\Form\Type;

use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupStudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*
            ->add('group', 'entity', array(
                'class' => 'AppBundle:Group',
                'property' => 'name',
                'label' => 'form.label.name',
                'translation_domain' => 'AppBundle'
            ))
            */
            ->add('student', 'entity', array(
                'class' => 'AppBundle:Student',
                'property' => 'getFullName',
                'label' => 'form.label.student',
                'translation_domain' => 'AppBundle'
            ))
            ->add('is_reinforcing', null, array(
                'required' => false,
                'label' => 'form.label.is_reinforcing',
                'translation_domain' => 'AppBundle'
            ))
            ->add('save', 'submit', array(
                'label' => 'form.label.save',
                'translation_domain' => 'AppBundle'
            ))
            ->getForm();
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GroupStudent',
            'label' => 'GroupStudent'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'appbundle_groupstudent';
    }
}