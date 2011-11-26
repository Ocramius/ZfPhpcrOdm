<?php
spl_autoload_register(include __DIR__ . '/autoload_function.php');
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        Zend\Loader\StandardAutoloader::LOAD_NS => array(
            /** @todo fix autoloading here */
            'ZfPhpcrOdm'                => __DIR__ . '/src/ZfMongoDbOdm',
            'Doctrine\ODM'              => __DIR__ . '/library/doctrine-phpcr-odm/lib/Doctrine/ODM',
            'Doctrine\Common'           => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/doctrine-common/lib/Doctrine/Common',
            'Jackalope'                 => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/src/Jackalope',
            'PHPCR\Util'                => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/lib/phpcr-util/src/PHPCR/Util',
            'PHPCR'                     => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/lib/phpcr/src/PHPCR',
            'Symfony'                   => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/Symfony',
        ),
    ),
));