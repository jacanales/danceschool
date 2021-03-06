<?php

declare(strict_types=1);

namespace App\School\UI\Form\Type;

use App\School\Domain\Model\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    /**
     * @param FormBuilderInterface<FormBuilderInterface> $builder
     * @param array<string>                              $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('User', UserType::class, [
                'show_legend' => false,
                'edit'        => $options['edit'],
            ])
            ->add('wage', IntegerType::class, [
                'label' => 'form.label.wage',
                'attr'  => ['value' => 0],
            ])
            ->add('comment', TextareaType::class, [
                'label'    => 'form.label.comment',
                'required' => false,
            ]);
    }

    /**
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'  => Teacher::class,
            'edit'        => false,
            'show_legend' => false,
        ]);
    }

    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix(): string
    {
        return 'teacher';
    }
}
