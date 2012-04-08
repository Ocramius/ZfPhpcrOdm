<?php
return array(
    'di' => array(
        'definition' => array(
            'class' => array(
                'Doctrine\ODM\PHPCR\DocumentManager' => array(
                    'instantiator' => array(
                        'Doctrine\ODM\PHPCR\DocumentManager',
                        'create',
                    ),
                    'methods' => array(
                        'create' => array(
                            'session' => array(
                                'type' => 'PHPCR\SessionInterface',
                                'required' => true,
                            ),
                            'config' => array(
                                'type' => 'Doctrine\ODM\PHPCR\Configuration',
                                'required' => false,
                            ),
                            'eventManager' => array(
                                'type' => 'Doctrine\Common\EventManager',
                                'required' => false,
                            ),
                        ),
                    ),
                ),
                'Doctrine\ODM\PHPCR\Configuration' => array(
                    'methods' => array(
                        'setValidateDoctrineMetadata' => array(
                            'validateDoctrineMetadata' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'setWriteDoctrineMetadata' => array(
                            'writeDoctrineMetadata' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'addDocumentNamespace' => array(
                            'alias' => array(
                                'type' => false,
                                'required' => true,
                            ),
                            'namespace' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'setDocumentNamespaces' => array(
                            'documentNamespaces' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'setMetadataDriverImpl' => array(
                            'metadataDriverImpl' => array(
                                'type' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
                                'required' => true,
                            ),
                        ),
                        'setDocumentClassMapper' => array(
                            'documentClassMapper' => array(
                                'type' => 'Doctrine\ODM\PHPCR\DocumentClassMapperInterface',
                                'required' => true,
                            ),
                        ),
                        'setProxyDir' => array(
                            'proxyDir' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'setProxyNamespace' => array(
                            'proxyNamespace' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'setAutoGenerateProxyClasses' => array(
                            'autoGenerateProxyClasses' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                    ),
                ),
                'ZfPhpcrOdm\ODM\PHPCR\Mapping\Driver\DriverChain' => array(
                    'methods' => array(
                        'addDriver' => array(
                            'nestedDriver' => array(
                                'type' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
                                'required' => true,
                            ),
                        ),
                    ),
                ),
                'PHPCR\SessionInterface' => array(
                    'instantiator' => array(
                        'ZfPhpcrOdm\SessionFactory',
                        'getSession',
                    ),
                ),
                'ZfPhpcrOdm\SessionFactory' => array(
                    'methods' => array(
                        'getSession' => array(
                            'repository' => array(
                                'type' => 'PHPCR\RepositoryInterface',
                                'required' => true,
                            ),
                            'credentials' => array(
                                'type' => 'PHPCR\CredentialsInterface',
                                'required' => true,
                            ),
                            'workspace' => array(
                                'type' => false,
                                'required' => false,
                            ),
                        ),
                    ),
                ),
                'Jackalope\Repository' => array(
                    'methods' => array(
                        '__construct' => array(
                            'factory' => array(
                                'type' => 'Jackalope\Factory',
                                'required' => true,
                            ),
                            'transport' => array(
                                'type' => 'Jackalope\TransportInterface',
                                'required' => true,
                            ),
                            'options' => array(
                                'type' => false,
                                'required' => false,
                            ),
                        ),
                    ),
                ),
                'Midgard\PHPCR\Repository' => array(
                    'instantiator' => array(
                        'Midgard\PHPCR\RepositoryFactory',
                        'getRepository',
                    ),
                ),
                'Midgard\PHPCR\RepositoryFactory' => array(
                    'methods' => array(
                        'getRepository' => array(
                            'parameters' => array(
                                'type' => false,
                                'required' => false,
                            ),
                        ),
                    ),
                ),
                'Jackalope\Transport\Jackrabbit\Client' => array(
                    'methods' => array(
                        '__construct' => array(
                            'factory' => array(
                                'type' => 'Jackalope\Factory',
                                'required' => true,
                            ),
                            'serverUri' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'addDefaultHeader' => array(
                            'defaultHeader' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'sendExpect' => array(
                            'expect' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                        'setCheckLoginOnServer' => array(
                            'checkLoginOnServer' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                    ),
                ),
                'Jackalope\Transport\DoctrineDBAL\Client' => array(
                    'methods' => array(
                        '__construct' => array(
                            'factory' => array(
                                'type' => 'Jackalope\Factory',
                                'required' => true,
                            ),
                            'conn' => array(
                                'type' => 'Doctrine\DBAL\Connection',
                                'required' => true,
                            ),
                            'indexes' => array(
                                'type' => false,
                                'required' => false,
                            ),
                            'cache' => array(
                                'type' => 'Doctrine\Common\Cache\Cache',
                                'required' => false,
                            ),
                        ),
                        'setCheckLoginOnServer' => array(
                            'checkLoginOnServer' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                    ),
                ),
                'Doctrine\DBAL\Connection' => array(
                    'instantiator' => array(
                        'Doctrine\DBAL\DriverManager',
                        'getConnection',
                    ),
                ),
                'Doctrine\DBAL\DriverManager' => array(
                    'methods' => array(
                        'getConnection' => array(
                            'params' => array(
                                'type' => false,
                                'required' => true,
                            ),
                            'config' => array(
                                'type' => 'Doctrine\DBAL\Configuration',
                                'required' => false,
                            ),
                            'eventManager' => array(
                                'type' => 'Doctrine\Common\EventManager',
                                'required' => false,
                            ),
                        ),
                    ),
                ),
                'Doctrine\DBAL\Configuration' => array(
                    'methods' => array(
                        'setSQLLogger' => array(
                            'logger' => array(
                                'type' => 'Doctrine\DBAL\Logging\SQLLogger',
                                'required' => true,
                            ),
                        ),
                        'setResultCacheImpl' => array(
                            'cacheImpl' => array(
                                'type' => 'Doctrine\Common\Cache\Cache',
                                'required' => true,
                            ),
                        ),
                    ),
                ),

                'Symfony\Component\Console\Application' => array(
                    'methods' => array(
                        'add' => array(
                            'command' => array(
                                'type' => 'Symfony\Component\Console\Command\Command',
                                'required' => true
                            ),
                        ),
                    ),
                ),
                'Symfony\Component\Console\Helper\HelperSet' => array(
                    'methods' => array(
                        'set' => array(
                            'helper' => array(
                                'type' => 'Symfony\Component\Console\Helper\HelperInterface',
                                'required' => true,
                            ),
                            'alias' => array(
                                'type' => false,
                                'required' => false,
                            ),
                        ),
                        'setCommand' => array(
                            'command' => array(
                                'type' => 'Symfony\Component\Console\Command\Command',
                                'required' => false,
                            ),
                        ),
                    ),
                ),
                'Doctrine\ODM\PHPCR\Tools\Console\Helper\DocumentManagerHelper' => array(
                    'methods' => array(
                        '__construct' => array(
                            'session' => array(
                                'type' => 'PHPCR\SessionInterface',
                                'required' => false,
                            ),
                            'dm' => array(
                                'type' => 'Doctrine\ODM\PHPCR\DocumentManager',
                                'required' => false,
                            ),
                        )
                    ),
                ),
                'Jackalope\Tools\Console\Helper\JackrabbitHelper' => array(
                    'methods' => array(
                        '__construct' => array(
                            'jackrabbit_jar' => array(
                                'type' => false,
                                'required' => true,
                            ),
                            'workspace_dir' => array(
                                'type' => false,
                                'required' => false,
                            ),
                        )
                    ),
                ),
            ),
        ),
        'instance' => array(

            'alias' => array(
                //document manager
                'zfphpcrodm-documentmanager' => 'Doctrine\ODM\PHPCR\DocumentManager',

                //session
                'zfphpcrodm-session' => 'PHPCR\SessionInterface',
                'zfphpcrodm-credentials' => 'PHPCR\SimpleCredentials',

                //repository
                'zfphpcrodm-midgard-repository' => 'Midgard\PHPCR\Repository',
                'zfphpcrodm-jackrabbit-repository' => 'Jackalope\Repository',
                'zfphpcrodm-jackrabbittransport' => 'Jackalope\Transport\Jackrabbit\Client',
                'zfphpcrodm-dbaltransport' => 'Jackalope\Transport\DoctrineDBAL\Client',
                'zfphpcrodm-jackalopefactory' => 'Jackalope\Factory',
                'zfphpcrodm-dbalconnection' => 'Doctrine\DBAL\Connection',
                'zfphpcrodm-dbaltransportcache' => 'Doctrine\Common\Cache\ArrayCache',
                'zfphpcrodm-dbalconfiguration' => 'Doctrine\DBAL\Configuration',
                'zfphpcrodm-dbalresultcache' => 'Doctrine\Common\Cache\ArrayCache',

                //config
                'zfphpcrodm-configuration' => 'Doctrine\ODM\PHPCR\Configuration',

                //event manager
                'zfphpcrodm-eventmanager' => 'Doctrine\Common\EventManager',

                //metadata
                'zfphpcrodm-metadatadriver' => 'ZfPhpcrOdm\ODM\PHPCR\Mapping\Driver\DriverChain',
                'zfphpcrodm-annotationdriver' => 'Doctrine\ODM\PHPCR\Mapping\Driver\AnnotationDriver',
                'zfphpcrodm-cachedreader' => 'Doctrine\Common\Annotations\CachedReader',
                'zfphpcrodm-annotationcache' => 'Doctrine\Common\Cache\ArrayCache',
                'zfphpcrodm-indexedreader' => 'Doctrine\Common\Annotations\IndexedReader',
                'zfphpcrodm-annotationreader' => 'Doctrine\Common\Annotations\AnnotationReader',

                //cli tools
                'zfphpcrodm-cli' => 'Symfony\Component\Console\Application',
                'zfphpcrodm-helperset' => 'Symfony\Component\Console\Helper\HelperSet',
                'zfphpcrodm-dmhelper' => 'Doctrine\ODM\PHPCR\Tools\Console\Helper\DocumentManagerHelper',
                'zfphpcrodm-jackrabbithelper' => 'Jackalope\Tools\Console\Helper\JackrabbitHelper',

                //cli commands
                'zfphpcrodm-cli-createworkspace' => 'PHPCR\Util\Console\Command\CreateWorkspaceCommand',
                'zfphpcrodm-cli-dump' => 'PHPCR\Util\Console\Command\DumpCommand',
                'zfphpcrodm-cli-purge' => 'PHPCR\Util\Console\Command\PurgeCommand',
                'zfphpcrodm-cli-registernodetypes' => 'PHPCR\Util\Console\Command\RegisterNodeTypesCommand',
                'zfphpcrodm-cli-sql2' => 'PHPCR\Util\Console\Command\Sql2Command',
                'zfphpcrodm-cli-registersystemnodetypes' => 'Doctrine\ODM\PHPCR\Tools\Console\Command\RegisterSystemNodeTypesCommand',
                'zfphpcrodm-cli-jackrabbit' => 'Jackalope\Tools\Console\Command\JackrabbitCommand',
                'zfphpcrodm-cli-initdoctrinedbal' => 'Jackalope\Tools\Console\Command\InitDoctrineDbalCommand',

            ),

            'preference' => array(
                'Doctrine\ODM\PHPCR\DocumentManager' => 'zfphpcrodm-documentmanager',
            ),

            //documentmanager
            'zfphpcrodm-documentmanager' => array(
                'parameters' => array(
                    'session' => 'zfphpcrodm-session',
                    'config' => 'zfphpcrodm-configuration',
                    'eventManager' => 'zfphpcrodm-eventmanager',
                ),
            ),

            'zfphpcrodm-configuration' => array(
                'parameters' => array(
                    'metadataDriverImpl' => 'zfphpcrodm-metadatadriver',
                    'proxyNamespace' => 'ZfPhpcrOdmSample\Proxy',
                    'proxyDir' => __DIR__ . '/../src/ZfPhpcrOdmSample/Proxy',
                ),
            ),

            //session
            'zfphpcrodm-session' => array(
                'parameters' => array(
                    //uncomment if you want to use midgard
                    //'repository' => 'zfphpcrodm-midgard-repository',
                    'repository' => 'zfphpcrodm-jackrabbit-repository',
                    'credentials' => 'zfphpcrodm-credentials',
                    'workspace' => 'default',
                ),
            ),

            'zfphpcrodm-credentials' => array(
                'parameters' => array(
                    'userID' => 'admin',
                    'password' => 'admin',
                ),
            ),

            'zfphpcrodm-midgard-repository' => array(
                'parameters' => array(
                    'parameters' => array(
                        'midgard2.configuration.db.type' => 'MySQL',
                        'midgard2.configuration.db.name' => 'test',
                        'midgard2.configuration.db.host' => 'localhost',
                        'midgard2.configuration.db.username' => 'root',
                        'midgard2.configuration.db.password' => '',
                        'midgard2.configuration.blobdir' => __DIR__ . '/../../../data/Midgard/blob',
                        'midgard2.configuration.db.init' => true
                    ),
                ),
            ),

            'zfphpcrodm-jackrabbit-repository' => array(
                'parameters' => array(
                    'factory' => 'zfphpcrodm-jackalopefactory',
                    'transport' => 'zfphpcrodm-jackrabbittransport',
                    //'transport' => 'zfphpcrodm-dbaltransport',
                    'options' => array(
                        'transactions' => true,
                        'stream_wrapper' => true,
                    ),
                ),
            ),

            'zfphpcrodm-jackrabbittransport' => array(
                'parameters' => array(
                    'factory' => 'zfphpcrodm-jackalopefactory',
                    'serverUri' => 'http://127.0.0.1:8080/server/',
                    'checkLoginOnServer' => false,
                    'expect' => false,
                ),
            ),

            'zfphpcrodm-dbaltransport' => array(
                'parameters' => array(
                    'factory' => 'zfphpcrodm-jackalopefactory',
                    'conn' => 'zfphpcrodm-dbalconnection',
                    'indexes' => array(),
                    'cache' => 'zfphpcrodm-dbaltransportcache',
                    'checkLoginOnServer' => false,
                ),
            ),

            'zfphpcrodm-dbaltransportcache' => array(
                'parameters' => array(
                    'namespace' => 'zfphpcrodm_dbaltransportcache',
                ),
            ),

            'zfphpcrodm-dbalconnection' => array(
                'parameters' => array(
                    'params' => array(
                        'driver' => 'pdo_mysql',
                        'host' => 'localhost',
                        'user' => 'root',
                        'password' => '',
                        'dbname' => 'test',
                    ),
                    'config' => 'zfphpcrodm-dbalconfiguration',
                    'eventManager' => 'zfphpcrodm-eventmanager',
                ),
            ),

            'zfphpcrodm-dbalconfiguration' => array(
                'parameters' => array(
                    'cacheImpl' => 'zfphpcrodm-dbalresultcache',
                ),
            ),

            'zfphpcrodm-dbalresultcache' => array(
                'parameters' => array(
                    'namespace' => 'zfphpcrodm_dbalresultcache',
                ),
            ),

            //metadata
            'zfphpcrodm-metadatadriver' => array(
                'injections' => array(
                    'zfphpcrodm-annotationdriver',
                ),
            ),

            'zfphpcrodm-annotationdriver' => array(
                'parameters' => array(
                    'reader' => 'zfphpcrodm-cachedreader',
                    'paths' => array(
                        __DIR__ . '/../src/ZfPhpcrOdm/Document',
                    ),
                ),
            ),

            'zfphpcrodm-cachedreader' => array(
                'parameters' => array(
                    'reader' => 'zfphpcrodm-indexedreader',
                    'cache' => 'zfphpcrodm-annotationcache',
                ),
            ),

            'zfphpcrodm-annotationcache' => array(
                'parameters' => array(
                    'namespace' => 'zfphpcrodm_annotation',
                ),
            ),

            'zfphpcrodm-indexedreader' => array(
                'parameters' => array(
                    'reader' => 'zfphpcrodm-annotationreader',
                ),
            ),

            //cli
            'zfphpcrodm-cli' => array(
                'parameters' => array(
                    'name' => 'ZfPhpcrOdm Module\'s CLI tools running on Doctrine PHPCR ODM dev-master',
                    'version' => 'dev-master',
                ),
                'injections' => array(
                    'zfphpcrodm-helperset',

                    'zfphpcrodm-cli-createworkspace',
                    'zfphpcrodm-cli-dump',
                    'zfphpcrodm-cli-purge',
                    'zfphpcrodm-cli-registernodetypes',
                    'zfphpcrodm-cli-sql2',
                    'zfphpcrodm-cli-registersystemnodetypes',
                    'zfphpcrodm-cli-jackrabbit',
                    'zfphpcrodm-cli-initdoctrinedbal',
                ),
            ),

            'zfphpcrodm-helperset' => array(
                'parameters' => array(
                    'helpers' => array(),
                ),
                'injections' => array(
                    'zfphpcrodm-dmhelper',
                    'zfphpcrodm-jackrabbithelper',
                ),
            ),

            'zfphpcrodm-dmhelper' => array(
                'parameters' => array(
                    'session' => null,
                    'dm' => 'zfphpcrodm-documentmanager',
                ),
            ),

            'zfphpcrodm-jackrabbithelper' => array(
                'parameters' => array(
                    'jackrabbit_jar' => realpath(__DIR__ . '/../bin/jackrabbit.jar'),
                    'workspace_dir' => realpath(__DIR__ . '/../../data'),
                ),
            ),

        ),
    ),
);
