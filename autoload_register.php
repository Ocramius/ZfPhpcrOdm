<?php
spl_autoload_register(include __DIR__ . '/autoload_function.php');
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        Zend\Loader\StandardAutoloader::LOAD_NS => array(
            'ZfPhpcrOdm'                => __DIR__ . '/src/ZfPhpcrOdm',
            'Doctrine\ODM'              => __DIR__ . '/library/doctrine-phpcr-odm/lib/Doctrine/ODM',
            'Doctrine\Common'           => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/doctrine-common/lib/Doctrine/Common',
            'Jackalope'                 => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/src/Jackalope',
            'PHPCR\Util'                => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/lib/phpcr-utils/src/PHPCR/Util',
            'PHPCR'                     => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/lib/phpcr/src/PHPCR',
            'Symfony\Component\Yaml'    => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/Symfony/Component/Yaml',
            'Symfony\Component\Console' => __DIR__ . '/library/doctrine-phpcr-odm/lib/vendor/jackalope/lib/phpcr-utils/lib/vendor/Symfony/Component/Console',
        ),
    ),
));