<?php

declare(strict_types=1);

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class             => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class               => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class                       => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class              => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class                 => ['all' => true],
    Sonata\CoreBundle\SonataCoreBundle::class                         => ['all' => true],
    Sonata\BlockBundle\SonataBlockBundle::class                       => ['all' => true],
    Knp\Bundle\MenuBundle\KnpMenuBundle::class                        => ['all' => true],
    Sonata\AdminBundle\SonataAdminBundle::class                       => ['all' => true],
    Sonata\Doctrine\Bridge\Symfony\Bundle\SonataDoctrineBundle::class => ['all' => true],
    Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle::class => ['all' => true],
    FOS\UserBundle\FOSUserBundle::class                               => ['all' => true],
    HWI\Bundle\OAuthBundle\HWIOAuthBundle::class                      => ['all' => true],
    Http\HttplugBundle\HttplugBundle::class                           => ['all' => true],
    Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle::class            => ['all' => true],
    Craue\FormFlowBundle\CraueFormFlowBundle::class                   => ['all' => true],
    EasyCorp\Bundle\EasyAdminBundle\EasyAdminBundle::class            => ['all' => true],
    Knp\Bundle\PaginatorBundle\KnpPaginatorBundle::class              => ['all' => true],
    Misd\PhoneNumberBundle\MisdPhoneNumberBundle::class               => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class                     => ['dev' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class         => ['dev' => true],
    Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle::class      => ['dev' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class                     => ['dev' => true],
    Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class         => ['all' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class    => ['all' => true],
    Sonata\DatagridBundle\SonataDatagridBundle::class                 => ['all' => true],
];
