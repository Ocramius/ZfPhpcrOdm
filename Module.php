<?php
namespace ZfPhpcrOdm;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Zend\Module\Manager;

/**
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class Module
{
    public function init(Manager $moduleManager)
    {
        $moduleManager->events()->attach('loadModules.post', array($this, 'modulesLoaded'));
    }

    public function modulesLoaded()
    {
        // Trying to load DoctrineAnnotations.php without knowing its location
        $annotationReflection = new \ReflectionClass('Doctrine\ODM\PHPCR\Mapping\ClassMetadata');
        AnnotationRegistry::registerFile(
            dirname($annotationReflection->getFileName()) . '/Annotations/DoctrineAnnotations.php'
        );
    }

    /**
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
