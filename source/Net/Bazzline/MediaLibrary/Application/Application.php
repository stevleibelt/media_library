<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18 
 */

namespace Net\Bazzline\MediaLibrary\Application;

use Net\Bazzline\MediaLibrary\Controller\Authentication;
use Propel\Silex\PropelServiceProvider;
use Silex\Application as ParentApplication;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\HttpCacheServiceProvider;
use Whoops\Provider\Silex\WhoopsServiceProvider;

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
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected $baseDir;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected $configuration;

    /**
     * @param string $pathToConfiguration
     * @return Application
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function setup($pathToConfiguration = '')
    {
        $application = new self();

        //configuration
        if (($pathToConfiguration != '')
            && file_exists($pathToConfiguration)
            && is_readable($pathToConfiguration)) {
            $application->setConfiguration($pathToConfiguration);
        }
        $application->setupBasics()
            ->setupControllersAndRoutes()
            ->setupDatabase()
            ->setupTemplate();

        return $application;
    }

    /**
     * @param array $configuration
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * @param string $name
     * @param null|mixed $default
     * @return null|mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected function getConfigurationParameter($name, $default = null)
    {
        return (isset($this->configuration[$name])) ? $this->configuration[$name] : $default;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected function setupDatabase()
    {
        $this['propel.config_file'] = $this->getConfigurationParameter('propel.configuration');
        $this['propel.model_path'] = $this->getConfigurationParameter('propel.models');
        $this->register(new PropelServiceProvider());

        return $this;
    }

    /**
     * Based on: http://silex.sensiolabs.org/doc/usage.html
     *
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected function setupControllersAndRoutes()
    {
        //adding controller
        $this['authentication.controller'] = $this->share(function() {
            return new Authentication($this);
        });


        $this->get('/', function () {
            $this->redirect('/authentication/login');
        });

        $this->get('/authentication/login', $this['authentication.controller:loginAction']);
        $this->get('/authentication/logout', $this['authentication.controller:logoutAction']);
        $this->get('/authentication/register', $this['authentication.controller:registerAction']);

        return $this;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected function setupBasics()
    {
        $this['debug'] = $this->getConfigurationParameter('debug', false);
        $this->baseDir = dirname(__FILE__) . '/..';
        $this->register(new ServiceControllerServiceProvider());
        $this->register(new SessionServiceProvider());
        $this->register(new HttpCacheServiceProvider(),
            array('http_cache.cache_dir' => $this->getConfigurationParameter('cache.http', '/')));
        if($this['debug']) {
            $this->register(new WhoopsServiceProvider);
        }

        return $this;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    protected function setupTemplate()
    {
        $this['twig.path'] = array(
            $this->baseDir . '/View'
        );

        return $this;
    }
}
