<?php

use myfrm\Validator;

$data = load(['email', 'password']);
$validator = new Validator();

$validation = $validator->validate($data, $rules = [
  'email' => [
    'email' => true,
  ],
  'password' => [
    'required' => true,
  ],
]);

if(!$validation->hasErrors()) {
  if(!$user = db()->query("SELECT * FROM users WHERE email = ?", [$data['email']])->find()) {
    $_SESSION['error'] = 'Неправильный email или пароль';
    redirect();
  } 

  if(!password_verify($data['password'], $user['password'])) {
    $_SESSION['error'] = 'Неправильный email или пароль';
    redirect();
  }

  foreach($user as $key=>$value) {
    if($key != 'password') {
      $_SESSION['user'][$key] = $value;
    }
  }

  redirect(PATH);
} else {
  $styleFile = 'register.css';
  require VIEWS . '/users/register.tpl.php';
}