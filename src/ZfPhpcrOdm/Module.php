<?php
namespace ZfPhpcrOdm;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Module that provides a PHPCR ODM DocumentManager
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class Module implements ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
