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
                                'type' => 'Doctrine\ODM\PHPCR\Mapping\Driver\Driver',
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
                                'type' => 'Doctrine\ODM\PHPCR\Mapping\Driver\Driver',
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
                'PHPCR\RepositoryInterface' => array(
                    'instantiator' => array(
                        'Jackalope\RepositoryFactoryJackrabbit',
                        'getRepository',
                    ),
                ),
                'Jackalope\RepositoryFactoryJackrabbit' => array(
                    'methods' => array(
                        'getRepository' => array(
                            'parameters' => array(
                                'type' => false,
                                'required' => false,
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
            ),
        ),
        'instance' => array(
            
            'alias' => array(
                
                //document manager
                'zfphpcrodm-documentmanager'            => 'Doctrine\ODM\PHPCR\DocumentManager',
                
                
                //session
                'zfphpcrodm-session'                    => 'PHPCR\SessionInterface',
                'zfphpcrodm-credentials'                => 'PHPCR\SimpleCredentials',
                'zfphpcrodm-repository'                 => 'PHPCR\RepositoryInterface',
                
                //config
                'zfphpcrodm-configuration'              => 'Doctrine\ODM\PHPCR\Configuration',
                
                //event manager
                'zfphpcrodm-eventmanager'               => 'Doctrine\Common\EventManager',
                
                //metadata
                'zfphpcrodm-metadatadriver'             => 'ZfPhpcrOdm\ODM\PHPCR\Mapping\Driver\DriverChain',
                'zfphpcrodm-annotationdriver'           => 'Doctrine\ODM\PHPCR\Mapping\Driver\AnnotationDriver',
                'zfphpcrodm-cachedreader'               => 'Doctrine\Common\Annotations\CachedReader',
                'zfphpcrodm-annotationcache'            => 'Doctrine\Common\Cache\ArrayCache',
                'zfphpcrodm-indexedreader'              => 'Doctrine\Common\Annotations\IndexedReader',
                'zfphpcrodm-annotationreader'           => 'Doctrine\Common\Annotations\AnnotationReader',
                
                //cli tools
                'zfphpcrodm-cli'                        => 'Symfony\Component\Console\Application',
                'zfphpcrodm-helperset'                  => 'Symfony\Component\Console\Helper\HelperSet',
                'zfphpcrodm-dmhelper'                   => 'Doctrine\ODM\PHPCR\Tools\Console\Helper\DocumentManagerHelper',
                
                //cli commands
                'zfphpcrodm-cli-createworkspace'        => 'PHPCR\Util\Console\Command\CreateWorkspaceCommand',
                'zfphpcrodm-cli-dump'                   => 'PHPCR\Util\Console\Command\DumpCommand',
                'zfphpcrodm-cli-purge'                  => 'PHPCR\Util\Console\Command\PurgeCommand',
                'zfphpcrodm-cli-registernodetypes'      => 'PHPCR\Util\Console\Command\RegisterNodeTypesCommand',
                'zfphpcrodm-cli-sql2'                   => 'PHPCR\Util\Console\Command\Sql2Command',
                'zfphpcrodm-cli-registersystemnodetypes'=> 'Doctrine\ODM\PHPCR\Tools\Console\Command\RegisterSystemNodeTypesCommand',
                'zfphpcrodm-cli-jackrabbit'             => 'Jackalope\Tools\Console\Command\JackrabbitCommand',
                'zfphpcrodm-cli-initdoctrinedbal'       => 'Jackalope\Tools\Console\Command\InitDoctrineDbalCommand',
                
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
                    'repository' => 'zfphpcrodm-repository',
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
            
            'zfphpcrodm-repository' => array(
                'parameters' => array(
                    'parameters' => array(
                        'jackalope.jackrabbit_uri' => 'http://127.0.0.1:8888/server/',
                    ),
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
                    'name'      => 'ZfPhpcrOdm Module\'s CLI tools running on Doctrine PHPCR ODM V' . \Doctrine\ODM\PHPCR\Version::VERSION,
                    'version'   => \ZfPhpcrOdm\Version::VERSION,
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
                ),
            ),
            
            'zfphpcrodm-dmhelper' => array(
                'parameters' => array(
                    'session' => null,
                    'dm' => 'zfphpcrodm-documentmanager',
                ),
            ),
            
        ),
    ),
);