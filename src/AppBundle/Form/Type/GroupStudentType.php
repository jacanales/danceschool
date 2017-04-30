<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\GroupStudent;
use AppBundle\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupStudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('student', EntityType::class, [
                'class'              => Student::class,
                'choice_label'       => 'getFullName',
                'label'              => 'form.label.student',
                'translation_domain' => 'AppBundle',
            ])
            ->add('is_reinforcing', CheckboxType::class, [
                'required'           => false,
                'label'              => 'form.label.is_reinforcing',
                'translation_domain' => 'AppBundle',
            ])
            ->add('save', SubmitType::class, [
                'label'              => 'form.label.save',
                'translation_domain' => 'AppBundle',
            ])
            ->getForm();
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GroupStudent::class,
            'label'      => 'GroupStudent',
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
        return 'group_student';
    }
}
