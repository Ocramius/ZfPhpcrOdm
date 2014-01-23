<?php
namespace ZfPhpcrOdm;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\Event;
use Zend\EventManager\EventInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Module that provides a PHPCR ODM DocumentManager
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class Module implements ConfigProviderInterface, BootstrapListenerInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        /* @var $app \Zend\Mvc\ApplicationInterface */
        $app = $e->getTarget();
        $events = $app->getEventManager()->getSharedManager();

        // Attach to helper set event and load the entity manager helper.
        $events->attach('doctrine', 'loadCli.post', function(EventInterface $e) {
            /* @var $cli \Symfony\Component\Console\Application */
            $cli = $e->getTarget();

            $cli->addCommands(array(
                new \PHPCR\Util\Console\Command\WorkspaceCreateCommand(),
                new \PHPCR\Util\Console\Command\NodeDumpCommand(),
                new \PHPCR\Util\Console\Command\WorkspaceImportCommand(),
                new \PHPCR\Util\Console\Command\WorkspacePurgeCommand(),
                new \PHPCR\Util\Console\Command\WorkspaceQueryCommand(),
                new \PHPCR\Util\Console\Command\NodeTypeRegisterCommand(),
                new \Doctrine\ODM\PHPCR\Tools\Console\Command\RegisterSystemNodeTypesCommand(),
                new \Jackalope\Tools\Console\Command\JackrabbitCommand(),
                new \Jackalope\Tools\Console\Command\InitDoctrineDbalCommand(),
            ));

            /* @var $sm \Zend\ServiceManager\ServiceLocatorInterface */
            $sm = $e->getParam('ServiceManager');
            $cli->getHelperSet()->set($sm->get('zfphpcrodm-dmhelper'));
        });
    }
}
