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
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function __construct()
    {
        $this->baseDir = dirname(__FILE__) . '/..';
    }

    /**
     * @param string $pathToConfiguration
     * @return Application
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public static function create($pathToConfiguration = '')
    {
        $application = new self();

        //configuration
        if (($pathToConfiguration != '')
            && file_exists($pathToConfiguration)
            && is_readable($pathToConfiguration)) {
            $application->setConfiguration($pathToConfiguration);
        }
        $application->setupBasics()
            ->setupRouterAndController()
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
    public function setupDatabase()
    {
        return $this;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function setupRouterAndController()
    {
        return $this;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function setupBasics()
    {
        $this['debug'] = $this->getConfigurationParameter('debug', false);

        return $this;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-18
     */
    public function setupTemplate()
    {
        $this['twig.path'] = array(
            $this->baseDir . '/View'
        );

        return $this;
    }
}
