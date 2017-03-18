<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
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
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('User', UserType::class, array(
                'show_legend' => false
            ))
            ->add('wage', IntegerType::class, array(
                'label' => 'form.label.wage',
                'translation_domain' => 'AppBundle'
            ))
            ->add('comment', TextareaType::class, array(
                'label' => 'form.label.comment',
                'translation_domain' => 'AppBundle'
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'form.label.save',
                'translation_domain' => 'AppBundle'
            ))
            ->getForm();
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Teacher'
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
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'appbundle_teacher';
    }
}
