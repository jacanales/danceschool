<?php

namespace App\Form\Type;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    private $class;

    public function __construct()
    {
        $this->class = User::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('name', null, [
                'label'              => 'form.label.name',
                'translation_domain' => 'AppBundle',
            ])
            ->add('lastname', null, [
                'label'              => 'form.label.lastname',
                'translation_domain' => 'AppBundle',
            ])
            ->add('username', HiddenType::class, [
                'data'               => uniqid('u:', true),
                'label'              => 'form.username',
                'translation_domain' => 'FOSUserBundle',
            ])
            ->add('email', EmailType::class, [
                'label'              => 'form.label.email',
                'translation_domain' => 'AppBundle',
            ])
            ->add('gender', GenderType::class, [
                'placeholder'        => 'form.choose_gender',
                'label'              => 'form.label.gender',
                'translation_domain' => 'AppBundle',
            ])
            ->add('birthday', BirthdayType::class, [
                'widget'             => 'single_text',
                'label'              => 'form.label.birthday',
                'translation_domain' => 'AppBundle',
                'placeholder'        => 'DD/MM/YYYY',
            ])
            ->add('phone', null, [
                'label'              => 'form.label.phone',
                'translation_domain' => 'AppBundle',
            ])
            ->add('address', null, [
                'label'              => 'form.label.address',
                'translation_domain' => 'AppBundle',
            ])
            ->add('city', null, [
                'label'              => 'form.label.city',
                'translation_domain' => 'AppBundle',
            ])
            ->add('country', null, [
                'label'              => 'form.label.country',
                'translation_domain' => 'AppBundle',
            ])
            ->add('postal_code', null, [
                'label'              => 'form.label.postal_code',
                'translation_domain' => 'AppBundle',
            ])
            ->add('identity_number', null, [
                'label'              => 'form.label.identity_number',
                'translation_domain' => 'AppBundle',
            ])
        ;

        $password = substr(str_shuffle(sha1(microtime())), 0, 20);

        if (!$options['edit']) {
            $builder
                ->add(
                    'plainPassword', RepeatedType::class, [
                    'type'            => HiddenType::class,
                    'options'         => ['translation_domain' => 'FOSUserBundle', 'empty_data' => $password],
                    'first_options'   => ['label' => 'form.password'],
                    'second_options'  => ['label' => 'form.password_confirmation'],
                    'invalid_message' => 'fos_user.password.mismatch',
                ]);
        }
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => $this->class,
            'intention'  => 'registration',
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

    public function getBlockPrefix(): string
    {
        return 'fos_user_registration';
    }
}
