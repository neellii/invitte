<?php
use myfrm\DateHandler;
$db = \myfrm\App::get(\myfrm\Db::class);
require_once CONFIG . '/admin.php';

$dateHanler = new DateHandler;
$tableData = $db->query("SELECT a.slug, a.template_id, a.created_at, a.delete_on, a.id, b.title from `event_data` a JOIN templates b ON a.template_id = b.id WHERE user_id = ?", [$_SESSION['user']['id']])->findAll();
$updatedTableData = [];
foreach($tableData as $data => $value) {
  $created_atUnix = $dateHanler->toUnix($value['created_at']);
  if($dateHanler->checkifDate($value['delete_on'], $created_atUnix)) {
    $value['remaining_time'] = $dateHanler->getRemainingTime($value['delete_on'], $created_atUnix);
    array_push($updatedTableData, $value);
  }
}
$styleFile = 'orders.css';

if($_SESSION['user']['admin'] === ADMIN) {
  $is_admin = true;
}

require_once VIEWS . '/profile/orders.tpl.php';

