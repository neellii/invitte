<?php

use myfrm\ServiceContainer;

$container = new ServiceContainer();
$container->setService(\myfrm\Db::class, function() {
  $db_config = require CONFIG . '/db.php';
  return (\myfrm\Db::getInstance())->getConnection($db_config);
});

\myfrm\App::setContainer($container);