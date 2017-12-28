<?php

namespace App\Form\Type;

use App\Entity\Course;
use App\Entity\Group;
use App\Entity\Room;
use App\Entity\Teacher;
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
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'              => 'form.label.name',
            ])
            ->add('weekday', WeekdayType::class, [
                'label'              => 'form.label.weekday',
            ])
            ->add('hour', TimeType::class, [
                'widget'             => 'single_text',
                'label'              => 'form.label.hour',
            ])
            ->add('start_date', DateType::class, [
                'widget'             => 'single_text',
                'placeholder'        => 'DD/MM/YYYY',
                 'label'             => 'form.label.start_date',
            ])
            ->add('end_date', DateType::class, [
                'widget'             => 'single_text',
                'placeholder'        => 'DD/MM/YYYY',
                'label'              => 'form.label.end_date',
            ])
            ->add('course', EntityType::class, [
                'class'              => Course::class,
                'choice_label'       => 'description',
                'label'              => 'form.label.course',
            ])
            ->add('room', EntityType::class, [
                'class'              => Room::class,
                'choice_label'       => 'name',
                'label'              => 'form.label.room',
            ])
            ->add('teacher', EntityType::class, [
                'class'              => Teacher::class,
                'choice_label'       => 'getFullName',
                'label'              => 'form.label.teacher',
            ])
            ->add('whatsapp_group', TextType::class, [
                'label'              => 'form.label.whatsapp_group',
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
            'data_class' => Group::class,
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
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'group';
    }
}
