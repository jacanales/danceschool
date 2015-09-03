<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('weekday', 'weekday', array(
                'label' => 'form.label.weekday',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('hour', null, array(
                'widget' => 'single_text',
                'label' => 'form.label.hour',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('start_date', null, array(
                'widget' => 'single_text',
                'label' => 'form.label.start_date',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('end_date', null, array(
                'widget' => 'single_text',
                'label' => 'form.label.end_date',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('course', 'entity', array(
                'class' => 'AppBundle:Course',
                'choice_label' => 'description',
                'label' => 'form.label.course',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle',
            ))
            ->add('room', 'entity', array(
                'class' => 'AppBundle:Room',
                'choice_label' => 'name',
                'label' => 'form.label.room',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('teacher', 'entity', array(
                'class' => 'AppBundle:Teacher',
                'choice_label' => 'getFullName',
                'label' => 'form.label.teacher',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('whatsapp_group', null, array(
                'label' => 'form.label.whatsapp_group',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->add('add', 'submit', array(
                'label' => 'form.label.save',
                'choice_translation_domain' => true,
                'translation_domain' => 'AppBundle'
            ))
            ->getForm();
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
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
