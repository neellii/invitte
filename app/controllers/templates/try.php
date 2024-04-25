<?php

$db = \myfrm\App::get(\myfrm\Db::class);
$template_id = explode('/', array_keys($_GET)[0])[2];
$styleFile = 'create.css';
require_once VIEWS . '/templates/try.tpl.php';