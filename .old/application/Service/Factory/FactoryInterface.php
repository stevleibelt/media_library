<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Service\Factory;

use Service\Locator;

/**
 * Interface FactoryInterface
 * @package Service\Factory
 */
interface FactoryInterface
{
    /**
     * @param Locator $locator
     * @return mixed
     */
    public function provide(Locator $locator);
}