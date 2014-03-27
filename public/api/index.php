<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-16
 */

require_once '../vendor/autoload.php';

use Luracast\Restler\Restler;

$server = new Restler();

$server->addAPIClass('Controller\Index', '/');
/*
//long way to go 1 / 20 - started: 140327
//general
$server->addAPIClass('Controller\Authentication', '/authentication');
$server->addAPIClass('Controller\Search', '/search');
$server->addAPIClass('Controller\User', '/user');
//media library
$server->addAPIClass('Controller\Artist', '/artist');
$server->addAPIClass('Controller\Audio', '/audio');
$server->addAPIClass('Controller\Book', '/book');
$server->addAPIClass('Controller\Comment', '/comment');
$server->addAPIClass('Controller\Common', '/common');
$server->addAPIClass('Controller\Distributor', '/distributor');
$server->addAPIClass('Controller\Edition', '/edition');
$server->addAPIClass('Controller\Game', '/game');
$server->addAPIClass('Controller\Genre', '/genre');
$server->addAPIClass('Controller\Language', '/language');
$server->addAPIClass('Controller\Media', '/media');
$server->addAPIClass('Controller\Plattform', '/plattform');
$server->addAPIClass('Controller\Type', '/type');
$server->addAPIClass('Controller\Track', '/track');
$server->addAPIClass('Controller\Video', '/video');
*/

$server->handle();
