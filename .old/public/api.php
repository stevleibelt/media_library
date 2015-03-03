<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-16
 */

require_once '../vendor/autoload.php';

use Luracast\Restler\Restler;

$server = new Restler();

$server->addAPIClass('Controller\IndexController', '/');

/*
//long way to go 1 / 19 - started: 140327
//general
$server->addAPIClass('Controller\AuthenticationController', '/api/authentication');
$server->addAPIClass('Controller\SearchController', '/api/search');
$server->addAPIClass('Controller\UserController', '/api/user');
//media library
$server->addAPIClass('Controller\ArtistController', '/api/artist');
$server->addAPIClass('Controller\AudioController', '/api/audio');
$server->addAPIClass('Controller\BookController', '/api/book');
$server->addAPIClass('Controller\CommentController', '/api/comment');
$server->addAPIClass('Controller\CommonController', '/api/common');
$server->addAPIClass('Controller\DistributorController', '/api/distributor');
$server->addAPIClass('Controller\EditionController', '/api/edition');
$server->addAPIClass('Controller\GameController', '/api/game');
$server->addAPIClass('Controller\GenreController', '/api/genre');
$server->addAPIClass('Controller\LanguageController', '/api/language');
$server->addAPIClass('Controller\MediaController', '/api/media');
$server->addAPIClass('Controller\PlatformController', '/api/platform');
$server->addAPIClass('Controller\TypeController', '/api/type');
$server->addAPIClass('Controller\TrackController', '/api/track');
$server->addAPIClass('Controller\VideoController', '/api/video');
*/

$server->handle();
