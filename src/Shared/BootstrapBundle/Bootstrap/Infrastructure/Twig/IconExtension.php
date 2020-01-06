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

namespace Zonadev\BootstrapBundle\Bootstrap\Infrastructure\Twig;

use Symfony\Component\HttpFoundation\Response;

/**
 * MopaBootstrap Icon Extension.
 *
 * @author Craig Blanchette (isometriks) <craig.blanchette@gmail.com>
 */
class IconExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    protected $iconSet;

    /**
     * @var string
     */
    protected $shortcut;

    /**
     * @var \Twig_Template
     */
    protected $iconTemplate;

    /**
     * Constructor.
     *
     * @param string $iconSet
     * @param string $shortcut
     */
    public function __construct($iconSet, $shortcut = null)
    {
        $this->iconSet  = $iconSet;
        $this->shortcut = $shortcut;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $options = [
            'is_safe'           => ['html'],
            'needs_environment' => true,
        ];

        $functions = [
            new \Twig_SimpleFunction('mopa_bootstrap_icon', [$this, 'renderIcon'], $options),
        ];

        if ($this->shortcut) {
            $functions[] = new \Twig_SimpleFunction($this->shortcut, [$this, 'renderIcon'], $options);
        }

        return $functions;
    }

    /**
     * Renders the icon.
     *
     * @param string $icon
     * @param bool   $inverted
     *
     * @return Response
     */
    public function renderIcon(\Twig_Environment $env, $icon, $inverted = false)
    {
        $template = $this->getIconTemplate($env);
        $context  = [
            'icon'     => $icon,
            'inverted' => $inverted,
        ];

        return $template->renderBlock($this->iconSet, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'mopa_bootstrap_icon';
    }

    /**
     * @return \Twig_Template
     */
    protected function getIconTemplate(\Twig_Environment $env)
    {
        if (null === $this->iconTemplate) {
            $this->iconTemplate = $env->loadTemplate('@MopaBootstrap/icons.html.twig');
        }

        return $this->iconTemplate;
    }
}
