<?php
use myfrm\DateHandler;
$db = \myfrm\App::get(\myfrm\Db::class);

$slug = routeParam('slug');
$dateHandler = new DateHandler();

$data = $db->query("SELECT * from `event_data` where slug = ?", [$slug])->findOrFail();
$inv_data = json_decode($data['invitation_data'], true);
$created_atUnix = strtotime($data['created_at']);
$int = $data['delete_on'];

if(!$dateHandler->checkifDate($int, $created_atUnix)) {
  abort();
} else {
  require_once VIEWS . "/invitations/template-{$data['template_id']}.tpl.php";
};

// dump(date("Y-m-d H:i:s", time())); // berlin tz time string
// dump(time()); //timestamp berlin INT
// dump($timeUnix); //local tz time
// dump($current_date->format('U')); //string timestamp local
// dump(strtotime($timeUnix)); //integer timestamp locaL
// dump(date("Y-m-d H:i:s", strtotime($timeUnix))); // string local time
// dump(date("Y-m-d H:i:s", strtotime('+1 month', strtotime($timeUnix))));//+1 month from local time formatted
