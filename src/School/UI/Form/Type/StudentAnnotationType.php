<?php

declare(strict_types=1);

namespace App\School\UI\Form\Type;

use App\School\Domain\Entity\Student;
use App\School\Domain\Entity\StudentAnnotation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentAnnotationType extends AbstractType
{
    private $edit;

    /**
     * @param bool $edit
     */
    public function __construct($edit = false)
    {
        $this->edit = $edit;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message', TextType::class, [
                'label' => 'form.label.message',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'form.label.save',
            ]);

        if (!$options['edit']) {
            $builder->add('student', HiddenType::class, [
                'data_class' => Student::class,
            ]);
        }

        $builder->getForm();
    }

    /**
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StudentAnnotation::class,
            'edit'       => false,
        ]);
    }

    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix(): string
    {
        return 'studentannotation';
    }
}