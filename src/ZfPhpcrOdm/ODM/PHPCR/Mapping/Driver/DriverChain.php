<?php
namespace ZfPhpcrOdm\ODM\PHPCR\Mapping\Driver;

use Doctrine\Common\Persistence\Mapping\Driver\MappingDriver as Driver;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\ODM\PHPCR\Mapping\MappingException;

/**
 * Provides Zend\Di compatible injection of chained drivers
 * This is a workaround for a behaviour that is unsupported by Zend\Di
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class DriverChain implements Driver
{
    /**
     * @var array
     */
    private $_drivers = array();

    /**
     * Add a nested driver.
     *
     * @param Driver $nestedDriver
     */
    public function addDriver(Driver $nestedDriver)
    {
        $this->_drivers[] = $nestedDriver;
    }

    /**
     * Get the array of nested drivers.
     *
     * @return array $drivers
     */
    public function getDrivers()
    {
        return $this->_drivers;
    }

    /**
     * Loads the metadata for the specified class into the provided container.
     *
     * @param string $className
     * @param ClassMetadata $metadata
     */
    public function loadMetadataForClass($className, ClassMetadata $metadata)
    {
        foreach ($this->_drivers as $driver) {
            $driver->loadMetadataForClass($className, $metadata);
            return;
        }

        throw MappingException::classIsNotAValidDocument($className);
    }

    /**
     * Gets the names of all mapped classes known to this driver.
     *
     * @return array The names of all mapped classes known to this driver.
     */
    public function getAllClassNames()
    {
        $classNames = array();
        $driverClasses = array();
        foreach ($this->_drivers as $driver) {
            $oid = spl_object_hash($driver);
            if (!isset($driverClasses[$oid])) {
                $driverClasses[$oid] = $driver->getAllClassNames();
            }

            foreach ($driverClasses[$oid] as $className) {
                $classNames[$className] = true;
            }
        }
        return array_keys($classNames);
    }

    /**
     * Whether the class with the specified name should have its metadata loaded.
     *
     * This is only the case for non-transient classes either mapped as an Entity or MappedSuperclass.
     *
     * @param string $className
     * @return boolean
     */
    public function isTransient($className)
    {
        foreach ($this->_drivers as $driver) {
            if (!$driver->isTransient($className)) {
                return false;
            }
        }

        // class isTransient, i.e. not an entity or mapped superclass
        return true;
    }

}