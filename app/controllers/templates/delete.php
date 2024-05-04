<?php
$db = \myfrm\App::get(\myfrm\Db::class);
require_once CONFIG . '/admin.php';

if($_SESSION['user']['admin'] === ADMIN) {
  $expired3 = $db->query("SELECT a.id, a.user_id, a.order_id, a.created_at, a.delete_on, b.email FROM `event_data` as a JOIN `users` as b ON a.user_id = b.id AND a.created_at + interval 97 day <= NOW() and a.delete_on = ?", [3])->findAll();
  $expired6 = $db->query("SELECT a.id, a.user_id, a.order_id, a.created_at, a.delete_on, b.email FROM `event_data` as a JOIN `users` as b ON a.user_id = b.id AND a.created_at + interval 97 day <= NOW() and a.delete_on = ?", [6])->findAll();
  $expiredData = array_merge($expired3, $expired6);
} else {
  abort();
}
$styleFile = 'orders.css';
require_once VIEWS . '/profile/delete.tpl.php';