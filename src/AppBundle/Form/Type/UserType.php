<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    private $class;

    private $edit;

    /**
     * @param string $class The User class name
     * @param bool $edit
     */
    public function __construct($class, $edit = false)
    {
        $this->class = $class;
        $this->edit = $edit;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('name', null, array(
                'label' => 'form.label.name',
                'translation_domain' => 'AppBundle'
            ))
            ->add('surname', null, array(
                'label' => 'form.label.surname',
                'translation_domain' => 'AppBundle'
            ))
            ->add('username', 'hidden', array(
                'data' => uniqid('u:', true),
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('email', 'email', array(
                'label' => 'form.label.email',
                'translation_domain' => 'AppBundle'
            ))
            ->add('gender', 'gender', array(
                'placeholder' => 'form.choose_gender',
                'label' => 'form.label.gender',
                'translation_domain' => 'AppBundle'
            ))
            ->add('birthday', 'birthday', array(
                'required' => false,
                'input' => 'string',
                'widget' => 'single_text',
                'years' => range(date('Y'), date('Y')-70),
                'label' => 'form.label.birthday',
                'translation_domain' => 'AppBundle'
            ))
            ->add('phone', null, array(
                'label' => 'form.label.phone',
                'translation_domain' => 'AppBundle'
            ))
            ->add('address', null, array(
                'label' => 'form.label.address',
                'translation_domain' => 'AppBundle'
            ))
            ->add('city', null, array(
                'label' => 'form.label.city',
                'translation_domain' => 'AppBundle'
            ))
            ->add('country', null, array(
                'label' => 'form.label.country',
                'translation_domain' => 'AppBundle'
            ))
            ->add('postal_code', null, array(
                'label' => 'form.label.postal_code',
                'translation_domain' => 'AppBundle'
            ))
            ->add('identity_number', null, array(
                'label' => 'form.label.identity_number',
                'translation_domain' => 'AppBundle'
            ))
        ;

        if (!$this->edit) {
            $password = substr(str_shuffle(sha1(microtime())), 0, 20);

            $builder
                ->add('plainPassword', 'repeated', array(
                    'type'      => 'hidden',
                    'options'   => array('translation_domain' => 'FOSUserBundle', 'empty_data' => $password),
                    'first_options' => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch'
                ));
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    // BC for SF < 2.7
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    public function getName()
    {
        return 'fos_user_registration';
    }
}
