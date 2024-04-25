<?php 

$template_id = $_POST['id'];
$user_id = $_SESSION['user']['id'];
$styleFile = 'payment-form.css';
$scriptFile = 'payment-form.js';
$months3 = 1600;
$months6 = 3000;
require_once VIEWS . '/payments/payment-form.tpl.php';