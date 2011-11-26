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
        //Following is part of autoloading in my opinion as otherwise doctrine
        //annotations wouldn't be considered as "loaded"
        AnnotationRegistry::registerFile(
            __DIR__ . '/library/doctrine-phpcr-odm/lib/Doctrine/ODM/PHPCR/Mapping/Annotations/DoctrineAnnotations.php'
        );
    }
    
    public function initAutoloader()
    {
        require __DIR__ . '/autoload_register.php';
    }
    
    /**
     * 
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/configs/module.config.php';
    }
    
    /**
     * 
     * @return array
     */
    public function getClassmap()
    {
        return include __DIR__ . '/classmap.php';
    }
    
}