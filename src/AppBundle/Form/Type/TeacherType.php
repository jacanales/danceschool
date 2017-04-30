<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('User', UserType::class, [
                'show_legend' => false,
                'edit'        => $options['edit'],
            ])
            ->add('wage', IntegerType::class, [
                'label'              => 'form.label.wage',
                'translation_domain' => 'AppBundle',
                'attr'               => ['value' => 0],
            ])
            ->add('comment', TextareaType::class, [
                'label'              => 'form.label.comment',
                'translation_domain' => 'AppBundle',
                'required'           => false,
            ])
            ->add('save', SubmitType::class, [
                'label'              => 'form.label.save',
                'translation_domain' => 'AppBundle',
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
            'data_class' => Teacher::class,
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
        return 'teacher';
    }
}
