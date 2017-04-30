<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Student;
use AppBundle\Entity\StudentAnnotation;
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

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message', TextType::class, [
                'label'              => 'form.label.message',
                'translation_domain' => 'AppBundle',
            ])
            ->add('save', SubmitType::class, [
                'label'              => 'form.label.save',
                'translation_domain' => 'AppBundle',
            ])
        ;

        if (!$options['edit']) {
            $builder->add('student', HiddenType::class, [
                'data_class' => Student::class,
            ]);
        }

        $builder->getForm();
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StudentAnnotation::class,
            'edit'       => false,
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
        return 'studentannotation';
    }
}
