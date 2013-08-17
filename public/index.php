<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-16
 */

namespace Net\Bazzline\MediaLibrary\Application;

require dirname(__FILE__) . '/../vendor/autoload.php';

Application::create(dirname(__FILE__) . '/../configuration/configuration.php')
    ->run();
