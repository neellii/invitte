<?php
$db = \myfrm\App::get(\myfrm\Db::class);

/**
 * @var \myfrm\Db $db
*/

$styleFile = 'create.css';
$oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
$up_data = json_decode($oldData['invitation_data'], true);
$iconsSet1 = getIcons(1);
require VIEWS . '/templates/update.tpl.php';