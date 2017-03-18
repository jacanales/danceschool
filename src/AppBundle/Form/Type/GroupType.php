<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Course;
use AppBundle\Entity\Group;
use AppBundle\Entity\Room;
use AppBundle\Entity\Teacher;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'              => 'form.label.name',
                'translation_domain' => 'AppBundle',
            ])
            ->add('weekday', WeekdayType::class, [
                'label'              => 'form.label.weekday',
                'translation_domain' => 'AppBundle',
            ])
            ->add('hour', TimeType::class, [
                'widget'             => 'single_text',
                'label'              => 'form.label.hour',
                'translation_domain' => 'AppBundle',
            ])
            ->add('start_date', DateType::class, [
                'widget'             => 'single_text',
                'placeholder'        => 'DD/MM/YYYY',
                 'label'             => 'form.label.start_date',
                'translation_domain' => 'AppBundle',
            ])
            ->add('end_date', DateType::class, [
                'widget'             => 'single_text',
                'placeholder'        => 'DD/MM/YYYY',
                'label'              => 'form.label.end_date',
                'translation_domain' => 'AppBundle',
            ])
            ->add('course', EntityType::class, [
                'class'              => Course::class,
                'choice_label'       => 'description',
                'label'              => 'form.label.course',
                'translation_domain' => 'AppBundle',
            ])
            ->add('room', EntityType::class, [
                'class'              => Room::class,
                'choice_label'       => 'name',
                'label'              => 'form.label.room',
                'translation_domain' => 'AppBundle',
            ])
            ->add('teacher', EntityType::class, [
                'class'              => Teacher::class,
                'choice_label'       => 'getFullName',
                'label'              => 'form.label.teacher',
                'translation_domain' => 'AppBundle',
            ])
            ->add('whatsapp_group', null, [
                'label'              => 'form.label.whatsapp_group',
                'translation_domain' => 'AppBundle',
            ])
            ->add('add', SubmitType::class, [
                'label'              => 'form.label.save',
                'translation_domain' => 'AppBundle',
            ])
            ->getForm();
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Group::class,
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
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'appbundle_group';
    }
}
