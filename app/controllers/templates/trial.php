<?php

use myfrm\Validator;

/**
 * @var \myfrm\Db $db
*/

  $fillable = ['groom_name', 'bride_name', 'to_whom', 'party_date', 'place', 'template_id'];
  $data = load($fillable);

  $validator = new Validator();
  $validation = $validator->validate($data, $rules = [
    'groom_name' => [
      'required' => true,
      'min' => 2,
      'max' => 190
    ],
    'bride_name' => [
      'required' => true,
      'min' => 2,
      'max' => 190
    ],
    'to_whom' => [
      'required' => true,
      'min' => 10,
      'max' => 190
    ],
    'party_date' => [
      'required' => true,
      'min' => 5,
      'max' => 190
    ],
    'place' => [
      'required' => true,
      'min' => 5,
      'max' => 190
    ],
    'template_id' => [
      'required' => true,
    ],
    'couple_img' => [
      'ext' => 'jpg|png|jpeg',
      'size' => 2097152, // 1 mb in bytes
    ],
  ]);

  // $data['user_id'] = $_SESSION['user']['id'];

  if(!$validation->hasErrors()) {
    require VIEWS . "/invitations/preview/template-{$data['template_id']}.tpl.php";
  } else {
    $styleFile = 'create.css';
    require VIEWS . '/templates/try.tpl.php';
  }