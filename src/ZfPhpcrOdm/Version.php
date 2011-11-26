<?php
namespace ZfPhpcrOdm;

/**
 * Class to store and retrieve the version of ZfPhpcrOdm.
 *
 * @category   ZfPhpcrOdm
 * @package    ZfPhpcrOdm\Version
 * @author     Marco Pivetta <ocramius@gmail.com>
 */
final class Version
{
    
    /**
     * ZfPhpcrOdm version identification - see compareVersion()
     */
    const VERSION = '1.0b';
    
    /**
     * Compares a ZfPhpcrOdm version with the current one.
     *
     * @param string $version ZfPhpcrOdm version to compare.
     * @return int Returns -1 if older, 0 if it is the same, 1 if version
     * passed as argument is newer.
     */
    public static function compare($version)
    {
        $currentVersion = str_replace(' ', '', strtolower(self::VERSION));
        $version = str_replace(' ', '', $version);

        return version_compare($version, $currentVersion);
    }
    
}