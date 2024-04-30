<?php
require_once CONFIG . '/admin.php';
if($_SESSION['user']['admin'] === ADMIN) {
  db()->query("INSERT INTO orders (user_id, template_id, price, status, payment_id) VALUES (?, ?, ?, ?, ?)", [$_SESSION['user']['id'], $_POST['id'], 1, 1, 1]);
  $order_id = db()->getInsertId();
  db()->query("INSERT INTO event_data (user_id, order_id, delete_on, template_id) VALUES (?, ?, ?, ?)", [$_SESSION['user']['id'], $order_id, 6, $_POST['id']]);
  redirect('https://cz82944.tw1.ru/orders');
} else {
  $template_id = $_POST['id'];
  $user_id = $_SESSION['user']['id'];
  $styleFile = 'payment-form.css';
  $scriptFile = 'payment-form.js';
  $months3 = 1600;
  $months6 = 3000;
  require_once VIEWS . '/payments/payment-form.tpl.php';
}
