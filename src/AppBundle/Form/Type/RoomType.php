<?php

namespace AppBundle\Form\Type;

use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('description', null, array(
                'label' => 'form.label.description',
                'translation_domain' => 'AppBundle'
            ))
            ->add('price', 'text', array(
                'label' => 'form.label.price',
                'translation_domain' => 'AppBundle'
            ))
            ->add('phone', 'tel', array(
                'default_region' => 'ES',
                'format' => PhoneNumberFormat::NATIONAL,
                'label' => 'form.label.phone',
                'translation_domain' => 'AppBundle'
            ))
            ->add('address', null, array(
                'label' => 'form.label.address',
                'translation_domain' => 'AppBundle'
            ))
            ->add('city', null, array(
                'label' => 'form.label.city',
                'translation_domain' => 'AppBundle'
            ))
            ->add('postal_code', null, array(
                'label' => 'form.label.postal_code',
                'translation_domain' => 'AppBundle'
            ))

            ->add('save', 'submit', array('label' => 'Create Room'))
            ->getForm();
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Room'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'room';
    }
}