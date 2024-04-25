<?php

$db = \myfrm\App::get(\myfrm\Db::class);
$likedString = $db->query("SELECT liked from users WHERE id=?", [$_SESSION['user']['id']])->getColumn();
$likedExploded = explode(':', json_decode($likedString));

$likedComma = implode(",", array_values($likedExploded));
$templates = $db->query("SELECT * FROM templates WHERE FIND_IN_SET(id, ?)", [$likedComma])->findAll();

$styleFile = 'index.css';
require_once VIEWS . '/profile/liked.tpl.php';
