<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserDataType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('surname')
            ->add('gender')
            ->add('birthday', 'date', array(
                'input' => 'timestamp',
                'widget' => 'choice'
            ))
            ->add('phone')
            ->add('address')
            ->add('city')
            ->add('country')
            ->add('postal_code')
            ->add('identity_number')
            ->add('created')
            ->add('modified')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserData'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_userdata';
    }
}
