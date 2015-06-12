<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeacherType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('User', new UserType('AppBundle\Entity\User'),
                array(
                    'by_reference' => false,
                )
            )
            ->add('wage')
            ->add('comment')
            ->add('save', 'submit', array('label' => 'Create Room'))
            ->getForm();
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Teacher'
        ));
    }

//    public function getParent()
//    {
//        return 'text';
//    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_teacher';
    }
}
