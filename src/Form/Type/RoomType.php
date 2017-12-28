<?php

namespace App\Form\Type;

use App\Entity\Room;
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
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('name', TextType::class, [
                'label'              => 'form.label.name',
            ])
            ->add('description', TextareaType::class, [
                'label'              => 'form.label.description',
            ])
            ->add('price', TextType::class, [
                'label'              => 'form.label.price',
            ])
            ->add('phone', PhoneNumberType::class, [
                'default_region'     => 'ES',
                'format'             => PhoneNumberFormat::NATIONAL,
                'label'              => 'form.label.phone',
            ])
            ->add('address', TextareaType::class, [
                'label'              => 'form.label.address',
            ])
            ->add('city', TextType::class, [
                'label'              => 'form.label.city',
            ])
            ->add('postal_code', TextType::class, [
                'label'              => 'form.label.postal_code',
            ])
            ->add('add', SubmitType::class, [
                'label'              => 'form.label.save',
            ])
            ->getForm();
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
            'label'      => 'Room',
        ]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getBlockPrefix(): string
    {
        return 'room';
    }
}
