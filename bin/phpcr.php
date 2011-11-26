<?php
use Zend\Loader\AutoloaderFactory,
    Zend\Config\Config,
    Zend\Loader\ModuleAutoloader,
    Zend\Module\Manager as ModuleManager,
    Zend\Module\Listener\ListenerOptions,
    Zend\Mvc\Bootstrap,
    Zend\Mvc\Application;

ini_set('display_errors', true);
error_reporting(-1);

defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../../../vendor'),
    realpath(__DIR__ . '/../../../vendor/ZendFramework/library'),
    get_include_path(),
)));

require_once 'Zend/Loader/AutoloaderFactory.php';
AutoloaderFactory::factory(array('Zend\Loader\StandardAutoloader' => array()));

$appConfig = include __DIR__ . '/../../../config/application.config.php';

$moduleLoader = new ModuleAutoloader($appConfig['module_paths']);
$moduleLoader->register();

$moduleManager = new ModuleManager($appConfig['modules']);
$listenerOptions = new ListenerOptions($appConfig['module_listener_options']);
$moduleManager->setDefaultListenerOptions($listenerOptions);
$moduleManager->loadModules();

$bootstrap      = new Bootstrap($moduleManager->getMergedConfig());
$application    = new Application();
$bootstrap->bootstrap($application);
$application
    ->getLocator()
    ->get('zfphpcrodm-cli')
    ->run();