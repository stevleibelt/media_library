<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-16
 */

require dirname(__FILE__) . '/../vendor/autoload.php';

Net\Bazzline\MediaLibrary\Application::create()
    ->run();
