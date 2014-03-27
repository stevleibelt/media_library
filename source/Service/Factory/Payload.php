<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Service\Factory;

use Service\Locator;

/**
 * Class Payload
 * @package Service\Factory
 */
class Payload implements FactoryInterface
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