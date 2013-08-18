<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-16
 */

namespace Net\Bazzline\MediaLibrary\Application;

require dirname(__FILE__) . '/../vendor/autoload.php';

$application = new Application();
$application->setup();

if ($application['debug']) {
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
    $application->run();
} else {
    $application['http_cache']->run();
}

