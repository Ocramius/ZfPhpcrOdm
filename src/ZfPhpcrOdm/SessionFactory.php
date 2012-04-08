<?php
namespace ZfPhpcrOdm;

use PHPCR\SessionInterface as Session,
    PHPCR\RepositoryInterface as Repository,
    PHPCR\CredentialsInterface as Credentials;

/**
 * Generates Sessions through credentials and repository
 *
 * @category   ZfPhpcrOdm
 * @package    ZfPhpcrOdm\SessionFactory
 * @author     Marco Pivetta <ocramius@gmail.com>
 */
abstract class SessionFactory
{
    /**
     *
     * @param Repository $repository
     * @param Credentials $credentials
     * @param string $workspace
     * @return Session
     */
    public static function getSession(
        Repository $repository,
        Credentials $credentials,
        $workspace = 'default'
    ) {
        return $repository->login($credentials, $workspace);
    }

}