<?php

namespace AppBundle\Form\Type;

use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('name', null, array(
                'label' => 'form.label.name',
                'translation_domain' => 'AppBundle'
            ))
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
            ->add('add', 'submit', array(
                'label' => 'form.label.save',
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
            'data_class' => 'AppBundle\Entity\Room',
            'label' => 'Room'
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
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getBlockPrefix()
    {
        return 'appbundle_room';
    }
}
