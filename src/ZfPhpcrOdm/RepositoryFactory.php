<?php
namespace ZfPhpcrOdm;

use Jackalope\RepositoryFactoryJackrabbit as JackrabbitFactory;

/**
 * Simple helper class used to proxy calls to @see Jackalope\RepositoryFactoryJackrabbit
 *
 * @author ocramius
 */
abstract class RepositoryFactory {
    
    /**
     * Helper method used to help Di locator to understand parameters
     *  
     * @param string $uri
     * @return \PHPCR\RepositoryInterface
     * @todo support other parameters or fix Di config as soon as possible
     */
    public static function getJackrabbitRepository($uri) {
        return JackrabbitFactory::getRepository(array(
            'jackalope.jackrabbit_uri' => $uri
        ));
    }
    
}