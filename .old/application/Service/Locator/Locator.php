<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Service;

class Locator
{
    /**
     * @var array
     */
    private $instancePool;

    public function __construct()
    {
        $this->instancePool = array();
    }

    /**
     * @return DatabaseLocator
     */
    public function getDatabaseLocator()
    {
        return $this->getFromInstancePoolOrCreate('databaseLocator');
    }

    /**
     * @return \Model\Payload
     */
    public function getPayload()
    {
        return $this->getFromInstancePoolOrCreate('payload');
    }

    /**
     * @param string $factoryClassName
     * @return mixed
     * @throws \InvalidArgumentException
     */
    private function getFromInstancePoolOrCreate($factoryClassName)
    {
        $index = sha1($factoryClassName);
        if (!isset($this->instancePool[$index])) {
            $fullQualifiedFactoryClassName = '\\Service\\Factory\\' . ucfirst($factoryClassName);
            if (!class_exists($fullQualifiedFactoryClassName)) {
                throw new \InvalidArgumentException(
                    'Factory class "' . $factoryClassName . '" not available in namespace \\Service\\Factory'
                );
            }
            $factory = new $fullQualifiedFactoryClassName();
            /** @var \Service\Factory\FactoryInterface $factory */
            $this->instancePool[$index] = $factory->provide($this);
        }

        return $this->instancePool[$index];
    }
} 