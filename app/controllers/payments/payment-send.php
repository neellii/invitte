<?php
require "../vendor/autoload.php";
use YooKassa\Client;
use myfrm\Validator;

require_once CONFIG . '/yoo.php';
$db = \myfrm\App::get(\myfrm\Db::class);

$fillable = ['price', 'template_id', 'user_id'];

$data = load($fillable);

$rules = [
  'template_id' => [
    'required' => true,
  ],
  'price' => [
    'required' => true,
    'priceRange' => [1600, 3000],
  ],
  'user_id' => [
    'required' => true,
  ]
];

$validator = new Validator();
$validation = $validator->validate($data, $rules);

if(!$validation->hasErrors()) {
  $db->query("INSERT INTO orders (user_id, template_id, price) VALUES (?, ?, ?)", [$data['user_id'], $data['template_id'], $data['price']]);
  $order_id = $db->getInsertId();

  try {
    $client = new \YooKassa\Client();
    $client->setAuth(SHOP_ID, SHOP_API);
    $response = $client->createPayment(
    array(
        'amount' => array(
            'value' => $data['price'],
            'currency' => 'RUB',
        ),
        'confirmation' => array(
            'type' => 'redirect',
            'return_url' => SUCCESS_URL,
        ),
        'capture' => true,
        'description' => "Заказ №{$order_id}",
        'metadata' => [
          'orderNumber' => $order_id,
          'userId' => $data['user_id'],
          'templateId' => $data['template_id']
        ],
    ),
    uniqid('', true)
  );

  $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();
  redirect($confirmationUrl);

  } catch(Exception $e) {
    error_log("[" . date('Y-m-d H:i:s') . "] YooKassa Error: {$e->getMessage()}" . PHP_EOL, 3, ERRORS_LOG_FILE);
    return false;
  }  
  
} else {
  $template_id = $_POST['id'];
  $user_id = $_SESSION['user']['id'];
  $styleFile = 'payment-form.css';
  $scriptFile = 'payment-form.js';
  $months3 = 1600;
  $months6 = 3000;
  require VIEWS . '/payments/payment-form.tpl.php';
}