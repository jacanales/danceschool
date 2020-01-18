<?php

declare(strict_types=1);

/*
 * This file is part of the MopaBootstrapBundle.
 *
 * (c) Philipp A. Mohrenweiser <phiamo@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zonadev\BootstrapBundle\Bootstrap\Infrastructure\Symfony\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MopaBootstrapExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('bootstrap.xml');
        $loader->load('twig.xml');
        $loader->load('command.xml');

        if (isset($config['bootstrap'])) {
            if (!isset($config['bootstrap']['install_path'])) {
                throw new \RuntimeException('Please specify the "bootstrap.install_path" or disable "mopa_bootstrap" in your application config.');
            }

            $container->setParameter('mopa_bootstrap.bootstrap.install_path', $config['bootstrap']['install_path']);
        }

        /*
         * Form
         */
        if (isset($config['form'])) {
            $loader->load('form.xml');
            foreach ($config['form'] as $key => $value) {
                if (\is_array($value)) {
                    $this->remapParameters($container, 'mopa_bootstrap.form.' . $key, $config['form'][$key]);
                } else {
                    $container->setParameter(
                        'mopa_bootstrap.form.' . $key,
                        $value
                    );
                }
            }

            // Get legacy bit
            $allowLegacy = $container->getParameter('mopa_bootstrap.form.allow_legacy');
            $addLegacy   = $allowLegacy || !\method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix');

            // Set tags
            $types = [
                'mopa_bootstrap.form.type.tab'          => 'tab',
                'mopa_bootstrap.form.type.form_actions' => 'form_actions',
            ];

            foreach ($types as $type => $alias) {
                $legacyTag      = $addLegacy ? ['alias' => $alias] : [];
                $typeDefinition = $container->getDefinition($type);
                $typeDefinition->addTag('form.type', $legacyTag);
            }
        }

        /*
         * Menu
         */
        if ($this->isConfigEnabled($container, $config['menu']) || $this->isConfigEnabled($container, $config['navbar'])) {
            // @deprecated: remove this BC layer
            if ($this->isConfigEnabled($container, $config['navbar'])) {
                \trigger_error(\sprintf('mopa_bootstrap.navbar is deprecated. Use mopa_bootstrap.menu.'), E_USER_DEPRECATED);
            }
            $loader->load('menu.xml');
            $this->remapParameters($container, 'mopa_bootstrap.menu', $config['menu']);
        }

        /*
         * Icons
         */
        if (isset($config['icons'])) {
            $this->remapParameters($container, 'mopa_bootstrap.icons', $config['icons']);
        }

        /*
         * Initializr
         */
        if (isset($config['initializr'])) {
            $loader->load('initializr.xml');
            $this->remapParameters($container, 'mopa_bootstrap.initializr', $config['initializr']);
        }

        /*
         * Flash
         */
        if (isset($config['flash'])) {
            $mapping = [];

            foreach ($config['flash']['mapping'] as $alertType => $flashTypes) {
                foreach ($flashTypes as $type) {
                    $mapping[$type] = $alertType;
                }
            }

            $container->getDefinition('mopa_bootstrap.twig.extension.bootstrap_flash')
                ->replaceArgument(0, $mapping);
        }
    }

    /**
     * Remap parameters.
     *
     * @param string $prefix
     */
    private function remapParameters(ContainerBuilder $container, $prefix, array $config)
    {
        foreach ($config as $key => $value) {
            $container->setParameter(\sprintf('%s.%s', $prefix, $key), $value);
        }
    }
}