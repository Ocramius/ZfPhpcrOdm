<?php
namespace ZfPhpcrOdm;

use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class Module
{
    public function init()
    {
        $this->initAutoloader();
        // Trying to load DoctrineAnnotations.php without knowing its location
        $annotationReflection = new \ReflectionClass('Doctrine\ODM\PHPCR\Mapping\ClassMetadata');
        AnnotationRegistry::registerFile(
            dirname($annotationReflection->getFileName()) . '/Annotations/DoctrineAnnotations.php'
        );
    }

    public function initAutoloader()
    {
        file_exists(__DIR__ . '/vendor/.composer/autoload.php')
            && require_once __DIR__ . '/vendor/.composer/autoload.php';
        //require __DIR__ . '/autoload_register.php';
    }

    /**
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/configs/module.config.php';
    }
}