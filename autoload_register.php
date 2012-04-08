<?php
spl_autoload_register(include __DIR__ . '/autoload_function.php');
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        Zend\Loader\StandardAutoloader::LOAD_NS => array(
            'ZfPhpcrOdm'                => __DIR__ . '/src/ZfPhpcrOdm',
        ),
    ),
));
