<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require dirname(__DIR__) . '/config/config.php';
require_once __DIR__ . '/bootstrap.php';
require CORE . '/funcs.php';
// require CORE . '/classes/Db.php';
// $db = new Db($db_config); => old connection way
//$db = \myfrm\App::getContainer()->getService(Db::class);
//$db = \myfrm\App::get(Db::class);
// db();

// $url = "posts/id-dolorem-set";
// $pattern = '#^posts/(?P<slug>[a-zA-Z0-9-]+)$#';
// var_dump(preg_match($pattern, $url, $matches));
// print_r($matches);

$router = new \myfrm\Router();

// require CORE . '/router.php';
require_once CONFIG . '/routes.php';
$router->match();





