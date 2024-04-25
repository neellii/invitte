<?php
$demo = true;
$db = \myfrm\App::get(\myfrm\Db::class);

$template_id = explode('/', array_keys($_GET)[0])[1];
$data = $db->query("SELECT * from `event_data` where slug=?", ['demo'])->findOrFail();
$inv_data = json_decode($data['invitation_data'], true);

require_once VIEWS . "/invitations/template-{$template_id}.tpl.php";
