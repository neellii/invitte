<?php
require "../vendor/autoload.php";
$db = \myfrm\App::get(\myfrm\Db::class);

use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\Notification\NotificationEventType;

$source = file_get_contents('php://input');
$requestBody = json_decode($source, true);

try {
  // $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
  //   ? new NotificationSucceeded($requestBody)
  //   : new NotificationWaitingForCapture($requestBody);

  $payment_status = $requestBody['object']['status'] ?? '';
  $payment_id = $requestBody['object']['id'] ?? '';
  $payment_paid = $requestBody['object']['paid'] ?? '';
  $payment_amount = $requestBody['object']['amount']['value'] ?? '';
  $payment_order_id = $requestBody['object']['metadata']['orderNumber'] ?? '';
  $user_id = $requestBody['object']['metadata']['userId'] ?? '';
  $template_id = $requestBody['object']['metadata']['templateId'] ?? '';

  if($payment_status == 'succeeded' && $payment_paid) {
    $correct_amount = $db->query("SELECT price FROM orders WHERE id = ?", [$payment_order_id])->getColumn();

    if($correct_amount == $payment_amount) {
      $db->query("UPDATE orders SET status = ?, payment_id = ? WHERE id = ?", [1, $payment_id, $payment_order_id]);

      if($payment_amount == 1600) {
        $db->query("INSERT INTO event_data (user_id, order_id, delete_on, template_id) VALUES (?, ?, ?, ?)", [$user_id, $payment_order_id, 3, $template_id]);
      } elseif($payment_amount == 3000) {
        $db->query("INSERT INTO event_data (user_id, order_id, delete_on, template_id) VALUES (?, ?, ?, ?)", [$user_id, $payment_order_id, 6, $template_id]);
      }

    } else {
      error_log("[" . date('Y-m-d H:i:s') . "] Incorrect amount {$payment_order_id} : {$payment_amount} Error: {$e->getMessage()}" . PHP_EOL, 3, ERRORS_LOG_FILE);
      return false;
    }
  }

} catch (Exception $e) {
  error_log("[" . date('Y-m-d H:i:s') . "] YooKassa Error: {$e->getMessage()}" . PHP_EOL, 3, ERRORS_LOG_FILE);
  return false;
}