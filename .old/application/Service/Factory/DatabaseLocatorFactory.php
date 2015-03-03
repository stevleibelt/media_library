<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Service\Factory;

use Propel;
use Service\DatabaseLocator;
use Service\Locator;

/**
 * Class Database
 * @package Service\Factory
 */
class DatabaseLocatorFactory implements FactoryInterface
{
    /**
     * @param Locator $locator
     * @return mixed
     */
    public function provide(Locator $locator)
    {
        if (!Propel::isInit()) {
            $pathToPropelConfiguration = realpath(__FILE__ . '/../../../propel/net-bazzline-media-library-conf.php');
            Propel::init($pathToPropelConfiguration);
        }

        return new DatabaseLocator();
    }
}