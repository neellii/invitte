<?php

$db = \myfrm\App::get(\myfrm\Db::class);

$slug = routeParam('slug');
$data = $db->query("SELECT * from `event_data` where slug = ?", [$slug])->findOrFail();
$inv_data = json_decode($data['invitation_data'], true);

require_once VIEWS . "/invImageTemplate/template-{$data['template_id']}.php";


