<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'form.label.name',
                'translation_domain' => 'AppBundle'
            ))
            ->add('weekday', 'weekday', array(
                'label' => 'form.label.weekday',
                'translation_domain' => 'AppBundle'
            ))
            ->add('hour', null, array(
                'widget' => 'single_text',
                'label' => 'form.label.hour',
                'translation_domain' => 'AppBundle'
            ))
            ->add('start_date', null, array(
                'widget' => 'single_text',
                'label' => 'form.label.start_date',
                'translation_domain' => 'AppBundle'
            ))
            ->add('end_date', null, array(
                'widget' => 'single_text',
                'label' => 'form.label.end_date',
                'translation_domain' => 'AppBundle'
            ))
            ->add('course', 'entity', array(
                'class' => 'AppBundle:Course',
                'property' => 'description',
                'label' => 'form.label.course',
                'translation_domain' => 'AppBundle'
            ))
            ->add('room', 'entity', array(
                'class' => 'AppBundle:Room',
                'property' => 'name',
                'label' => 'form.label.room',
                'translation_domain' => 'AppBundle'
            ))
            ->add('teacher', 'entity', array(
                'class' => 'AppBundle:Teacher',
                'property' => 'getFullName',
                'label' => 'form.label.teacher',
                'translation_domain' => 'AppBundle'
            ))
            ->add('whatsapp_group', null, array(
                'label' => 'form.label.whatsapp_group',
                'translation_domain' => 'AppBundle'
            ))
            ->add('add', 'submit', array(
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
            'data_class' => 'AppBundle\Entity\Group'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_group';
    }
}
