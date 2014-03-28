<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Service\Factory;

use Service\Locator;

/**
 * Class PayloadFactory
 * @package Service\Factory
 */
class PayloadFactory implements FactoryInterface
{
    /**
     * @param Locator $locator
     * @return \Model\Payload
     */
    public function provide(Locator $locator)
    {
        return new \Model\Payload();
    }
}