<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18 
 */

namespace Net\Bazzline\MediaLibrary\Controller;

use Silex\Controller;

use Net\Bazzline\MediaLibrary\Application\Application;
use Net\Bazzline\MediaLibrary\Model\IO\Request;

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
     * @var \Net\Bazzline\MediaLibrary\Model\IO\Request
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected $request;

    /**
     * @param Application $application
     * @param Request $request
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function __construct(Application $application, Request $request)
    {
        $this->application = $application;
        $this->request = $request;
    }
}