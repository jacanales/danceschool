<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Room;
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('name', TextType::class, [
                'label' => 'form.label.name',
                'translation_domain' => 'AppBundle'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'form.label.description',
                'translation_domain' => 'AppBundle'
            ])
            ->add('price', TextType::class, [
                'label' => 'form.label.price',
                'translation_domain' => 'AppBundle'
            ])
            ->add('phone', PhoneNumberType::class, [
                'default_region' => 'ES',
                'format' => PhoneNumberFormat::NATIONAL,
                'label' => 'form.label.phone',
                'translation_domain' => 'AppBundle'
            ])
            ->add('address', TextareaType::class, [
                'label' => 'form.label.address',
                'translation_domain' => 'AppBundle'
            ])
            ->add('city', TextType::class, [
                'label' => 'form.label.city',
                'translation_domain' => 'AppBundle'
            ])
            ->add('postal_code', TextType::class, [
                'label' => 'form.label.postal_code',
                'translation_domain' => 'AppBundle'
            ])
            ->add('add', SubmitType::class, [
                'label' => 'form.label.save',
                'translation_domain' => 'AppBundle'
            ])
            ->getForm();
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
            'label' => 'Room'
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
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getBlockPrefix()
    {
        return 'appbundle_room';
    }
}
