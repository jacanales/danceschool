<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
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
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', null, array(
                'label' => 'form.label.message',
                'translation_domain' => 'AppBundle'
            ))
            ->add('save', 'submit', array(
                'label' => 'form.label.save',
                'translation_domain' => 'AppBundle'
            ))
        ;

        if (!$this->edit) {
            $builder->add('student', 'hidden', array(
                'data_class' => 'AppBundle\Entity\Student'
            ));
        }

        $builder->getForm();
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\StudentAnnotation'
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
        return 'appbundle_studentannotation';
    }
}
