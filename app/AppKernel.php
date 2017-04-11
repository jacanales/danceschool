<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            # Framework
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle(),
            new AppBundle\AppBundle(),

            # Third-party bundles
            new FOS\UserBundle\FOSUserBundle(),
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Craue\FormFlowBundle\CraueFormFlowBundle(),
            new JavierEguiluz\Bundle\EasyAdminBundle\EasyAdminBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
//            new Liip\ThemeBundle\LiipThemeBundle(),
            new Misd\PhoneNumberBundle\MisdPhoneNumberBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();

            # Third-party bundles
            $bundles[] = new Webfactory\Bundle\ExceptionsBundle\WebfactoryExceptionsBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
//            $bundles[] = new Egulias\ListenersDebugCommandBundle\EguliasListenersDebugCommandBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $envFolder = $this->getRootDir() . '/config/' . $this->getEnvironment() . '/config.yml';

        if (file_exists($envFolder)) {
            $loader->load($envFolder);
        } else {
            $loader->load($this->getRootDir() . '/config/common/config.yml');
        }
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/' . $this->environment;
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    protected function isFolderCreated($folder)
    {
        // Get canonicalized absolute pathname
        $path = realpath($folder);

        // If it exist, check if it's a directory
        return ($path !== false && is_dir($path)) ? $path : false;
    }
}
