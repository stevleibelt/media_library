<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18 
 */

namespace Net\Bazzline\MediaLibrary\Controller;

use Silex\Controller;

use Net\Bazzline\MediaLibrary\Application\Application;

/**
 * Class AbstractController
 *
 * @package Net\Bazzline\MediaLibrary\Controller
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18
 */
class AbstractController extends Controller
{
    /**
     * @var \Net\Bazzline\MediaLibrary\Application\Application
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected $application;

    /**
     * @param Application $application
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }
}