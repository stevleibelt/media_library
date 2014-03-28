<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-16
 */

require_once '../vendor/autoload.php';

use Luracast\Restler\Restler;

$server = new Restler();

$server->addAPIClass('Controller\Index');

/*
//long way to go 1 / 19 - started: 140327
//general
$server->addAPIClass('Controller\Authentication', '/api/authentication');
$server->addAPIClass('Controller\Search', '/api/search');
$server->addAPIClass('Controller\User', '/api/user');
//media library
$server->addAPIClass('Controller\Artist', '/api/artist');
$server->addAPIClass('Controller\Audio', '/api/audio');
$server->addAPIClass('Controller\Book', '/api/book');
$server->addAPIClass('Controller\Comment', '/api/comment');
$server->addAPIClass('Controller\Common', '/api/common');
$server->addAPIClass('Controller\Distributor', '/api/distributor');
$server->addAPIClass('Controller\Edition', '/api/edition');
$server->addAPIClass('Controller\Game', '/api/game');
$server->addAPIClass('Controller\Genre', '/api/genre');
$server->addAPIClass('Controller\Language', '/api/language');
$server->addAPIClass('Controller\Media', '/api/media');
$server->addAPIClass('Controller\Plattform', '/api/plattform');
$server->addAPIClass('Controller\Type', '/api/type');
$server->addAPIClass('Controller\Track', '/api/track');
$server->addAPIClass('Controller\Video', '/api/video');
*/

$server->handle();
