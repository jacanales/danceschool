<?php

declare(strict_types=1);

namespace App\School\UI\Form\Type;

use App\Security\Domain\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    private string $class;

    public function __construct()
    {
        $this->class = User::class;
    }

    /**
     * @param FormBuilderInterface<FormBuilderInterface> $builder
     * @param array<string>                              $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('name', null, [
                'label' => 'form.label.name',
            ])
            ->add('surname', null, [
                'label' => 'form.label.lastname',
            ])
            ->add('username', HiddenType::class, [
                'data'  => \uniqid('u:', true),
                'label' => 'form.username',
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.label.email',
            ])
            ->add('gender', GenderType::class, [
                'placeholder' => 'form.choose_gender',
                'label'       => 'form.label.gender',
            ])
            ->add('birthday', BirthdayType::class, [
                'widget'      => 'single_text',
                'label'       => 'form.label.birthday',
                'placeholder' => 'DD/MM/YYYY',
            ])
            ->add('phone', null, [
                'label' => 'form.label.phone',
            ])
            ->add('address', null, [
                'label' => 'form.label.address',
            ])
            ->add('city', null, [
                'label' => 'form.label.city',
            ])
            ->add('country', CountryType::class, [
                'label' => 'form.label.country',
            ])
            ->add('postal_code', null, [
                'label' => 'form.label.postal_code',
            ])
            ->add('identity_number', null, [
                'label' => 'form.label.identity_number',
            ]);

        $password = \mb_substr(\str_shuffle(\sha1(\microtime())), 0, 20);

        if (!$options['edit']) {
            $builder
                ->add(
                    'password',
                    RepeatedType::class,
                    [
                    'type'            => HiddenType::class,
                    'options'         => ['translation_domain' => 'FOSUserBundle', 'empty_data' => $password],
                    'first_options'   => ['label' => 'form.password'],
                    'second_options'  => ['label' => 'form.password_confirmation'],
                    'invalid_message' => 'fos_user.password.mismatch',
                ]
                );
        }
    }

    /**
     * @throws AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => $this->class,
            'intention'  => 'registration',
            'edit'       => false,
        ]);
    }

    public function getName(): string
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix(): string
    {
        return 'fos_user_registration';
    }
}
