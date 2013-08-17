<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18 
 */

namespace Net\Bazzline\MediaLibrary\Application;

use Silex\Application as ParentApplication;

/**
 * Class Application
 *
 * @package Net\Bazzline\MediaLibrary\Application
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18
 */
class Application extends ParentApplication
{
    /**
     * @return Application
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public static function create()
    {
        $application = new self();
        //bootstrap

        return $application;
    }
}
