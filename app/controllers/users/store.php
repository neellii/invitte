<?php
use myfrm\Validator;
$data = load(['name', 'email', 'password', 'policy']);
$validator = new Validator();

$validation = $validator->validate($data, $rules = [
  'name' => [
    'required' => true,
    'min' => 2,
    'max' => 100,
  ],
  'email' => [
    'email' => true,
    'max' => 100,
    'unique' => 'users:email'
  ],
  'password' => [
    'required' => true,
    'min' => 6,
  ],
  'policy' => [
    'required' => true,
  ]
]);


if(!$validation->hasErrors()) {
  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  if(db()->query("INSERT INTO users (`name`, `email`, `password`) VALUES (?, ?, ?)",
    [$data['name'], $data['email'], $data['password']]
  )) {
   
    $_SESSION['success'] = 'Регистрация успешна. Войдите в аккаунт.';
  } else {
    $_SESSION['error'] = 'Что-то пошло не так. Попробуйте снова позже.';
  }

  redirect('login');
} else {
  $styleFile = 'register.css';
  require VIEWS . '/users/register.tpl.php';
}