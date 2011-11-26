<?php
namespace ZfPhpcrOdm;

/**
 * 
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class Module
{
    
    public function init()
    {
        $this->initAutoloader();
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