<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-16
 */

namespace Net\Bazzline\MediaLibrary;

use Silex\Application as ParentApplication;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class Application extends ParentApplication
{
    public static function create()
    {
        //bootstrap

        $application = new self();
        $application['key'] = 'media_library_2013-08-16';

        return $application;
    }
}
