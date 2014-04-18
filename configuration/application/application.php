<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-18 
 */

$baseDir = dirname(__FILE__);

return array(
    'debug' => true,
    'registration.enabled' => false,
    'cache.http' => $baseDir . '/../../cache/http',
    'propel.configuration' => $baseDir . '/../propel/net-bazzline-media-library-conf.php',
    'propel.models' => $baseDir . '/../../source/Net/Bazzline/MediaLibrary/Model/Database/'
);