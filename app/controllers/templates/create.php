<?php
$db = \myfrm\App::get(\myfrm\Db::class);

  $event_id = $_POST['event_id'];
 $iconsSet1 = getIcons('1');
 $styleFile = "create.css";
 require_once VIEWS . '/templates/create.tpl.php';

