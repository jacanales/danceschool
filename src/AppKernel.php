<?php

use App\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends BaseKernel
{
    /**
     * @param LoaderInterface $loader
     * @throws Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $envFolder = $this->getProjectDir() . '/config/' . $this->getEnvironment() . '/config.yaml';

        if (file_exists($envFolder)) {
            $loader->load($envFolder);
        } else {
            $loader->load($this->getProjectDir() . '/config/common/config.yaml');
        }
    }
}
