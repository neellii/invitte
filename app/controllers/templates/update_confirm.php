<?php
require ROOT . "/vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use myfrm\Validator;
$db = \myfrm\App::get(\myfrm\Db::class);
/**
 * @var \myfrm\Db $db
*/

$oldData = $db->query("SELECT * from `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
$up_data = json_decode($oldData['invitation_data'], true);

$fillable = ['groom_name', 'bride_name', 'to_whom', 'party_date', 'place', 'slug', 'template_id', 'date_timer', 'hashtag', 'note', 'contacts', 'contacts_url', 'full_name', 'attending', 'guests_number', 'allergy_info', 'guest_note', 'og_title', 'og_desc', 'programm_name', 'programm_time', 'programm_place', 'programm_icon', 'hex_color', 'rsvp_ques'];

$data = load($fillable);

if(isset($_FILES['couple_img']['name']) && $_FILES['couple_img']['error'] === 0) {
  $data['couple_img'] = $_FILES['couple_img'];
} else {
  $data['couple_img'] = [];
}

if(isset($_FILES['og_image']['name']) && $_FILES['og_image']['error'] === 0) {
  $data['og_image'] = $_FILES['og_image'];
} else {
  $data['og_image'] = [];
}

$rules = [
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
  'slug' => [
    'required' => true,
    'oldValue' => 'event_data:slug:' . $oldData['slug'],
    'slug' => true,
    'min' => 2,
    'max' => 255
  ],
  'template_id' => [
    'required' => true,
  ],
  'date_timer' => [
    'date_timer' => true,
  ],
  'couple_img' => [
    'ext' => 'jpg|png|jpeg',
    'size' => 2097152, // 1 mb in bytes
  ],
  'og_image' => [
    'ext' => 'jpg|png|jpeg',
    'size' => 2097152, // 1 mb in bytes
  ],
  'og_title' => [
    'max' => 70,
    'min' => 2
  ],
  'og_desc' => [
    'max' => 200,
    'min' => 2
  ],
  'hex_color' => [
    'hex' => true,
  ]
];

$validator = new Validator();
$validation = $validator->validate($data, $rules);

if(!$validation->hasErrors()) {
  $data['user_id'] = $_SESSION['user']['id'];
  
  if(!empty($data['couple_img']['name']) && isset($up_data['couple_img'])) {
    unlink(WWW . $up_data['couple_img']);
    $file_ext = getFileExt($data['couple_img']['name']);
    $dir = '/couple_img/' . date('Y') . '/' . date('m') . '/' . date('d');
    if(!is_dir(UPLOADS . $dir)) {
      mkdir(UPLOADS . $dir, 0755, true);
    } //if folder does not exist create folders
    
    $file_path = UPLOADS . "{$dir}/couple_img_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    $file_url = "/uploads{$dir}/couple_img_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    
    if(move_uploaded_file($data['couple_img']['tmp_name'], $file_path)) {
      $data['couple_img'] = $file_url;
    } else {
      $_SESSION['error'] = 'DB Error';
      error_log("[" . date('Y-m-d H:i:s') . "] Error upload couple_img" . PHP_EOL, 3, ERRORS_LOG_FILE);
      $iconsSet1 = getIcons('1');
      $styleFile = 'create.css';
      $oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
      $up_data = json_decode($oldData['invitation_data'], true);
      require VIEWS . '/update.tpl.php';
    }
  } elseif(isset($up_data['couple_img']) && empty($data['couple_img']['name'])) {
    $data['couple_img'] = $up_data['couple_img'];
  } elseif(!empty($data['couple_img']['name']) && !isset($up_data['couple_img'])) {
    $file_ext = getFileExt($data['couple_img']['name']);
    $dir = '/couple_img/' . date('Y') . '/' . date('m') . '/' . date('d');
    if(!is_dir(UPLOADS . $dir)) {
      mkdir(UPLOADS . $dir, 0755, true);
    } //if folder does not exist create folders
    
    $file_path = UPLOADS . "{$dir}/couple_img_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    $file_url = "/uploads{$dir}/couple_img_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    
    if(move_uploaded_file($data['couple_img']['tmp_name'], $file_path)) {
      $data['couple_img'] = $file_url;
    } else {
      $_SESSION['error'] = 'DB Error';
      error_log("[" . date('Y-m-d H:i:s') . "] Error upload couple_img" . PHP_EOL, 3, ERRORS_LOG_FILE);
      $iconsSet1 = getIcons('1');
      $styleFile = 'create.css';
      $oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
      $up_data = json_decode($oldData['invitation_data'], true);
      require VIEWS . '/templates/update.tpl.php';
    }
  } else {
    unset($data['couple_img']);
  }

  if(!empty($data['og_image']['name']) && isset($up_data['og_image'])) {
    unlink(WWW . $up_data['og_image']);
    $file_ext = getFileExt($data['og_image']['name']);
    $dir = '/og_image/' . date('Y') . '/' . date('m') . '/' . date('d');
    if(!is_dir(UPLOADS . $dir)) {
      mkdir(UPLOADS . $dir, 0755, true);
    } //if folder does not exist create folders
    
    $file_path = UPLOADS . "{$dir}/og_image_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    $file_url = "/uploads{$dir}/og_image_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    
    if(move_uploaded_file($data['og_image']['tmp_name'], $file_path)) {
      $data['og_image'] = $file_url;
    } else {
      $_SESSION['error'] = 'DB Error';
      error_log("[" . date('Y-m-d H:i:s') . "] Error upload og_image" . PHP_EOL, 3, ERRORS_LOG_FILE);
      $iconsSet1 = getIcons('1');
      $styleFile = 'create.css';
      $oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
      $up_data = json_decode($oldData['invitation_data'], true);
      require VIEWS . '/templates/create.tpl.php';
    }
  } elseif(isset($up_data['og_image']) && empty($data['og_image']['name'])) {
    $data['og_image'] = $up_data['og_image'];
    //unset($data['og_image']);
  } elseif(!empty($data['og_image']['name']) && !isset($up_data['og_image'])) {
    $file_ext = getFileExt($data['og_image']['name']);
    $dir = '/og_image/' . date('Y') . '/' . date('m') . '/' . date('d');
    if(!is_dir(UPLOADS . $dir)) {
      mkdir(UPLOADS . $dir, 0755, true);
    } //if folder does not exist create folders
    
    $file_path = UPLOADS . "{$dir}/og_image_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    $file_url = "/uploads{$dir}/og_image_{$data['user_id']}_" . date('H_i_s') . ".{$file_ext}";
    
    if(move_uploaded_file($data['og_image']['tmp_name'], $file_path)) {
      $data['og_image'] = $file_url;
    } else {
      $_SESSION['error'] = 'DB Error';
      error_log("[" . date('Y-m-d H:i:s') . "] Error upload og_image" . PHP_EOL, 3, ERRORS_LOG_FILE);
      $iconsSet1 = getIcons('1');
      $styleFile = 'create.css';
      $oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
      $up_data = json_decode($oldData['invitation_data'], true);
      require VIEWS . '/templates/update.tpl.php';
    }
  } else {
    unset($data['og_image']);
  }

  $keys = ['template_id', 'slug', 'user_id'];
  $final = array_intersect_key($data, array_fill_keys($keys, '1'));
  unset($data['template_id'], $data['slug'], $data['user_id']);
  foreach($data as $k => &$v) {
    if(is_array($v) && count($v) === 1 && $v[1] === "") {
      unset($data[$k]);
    }
  }

  if($oldData['slug'] !== $final['slug']) {
    unlink('../public' . $up_data['qr_code_url']);
    $qr_code = QrCode::create("http://localhost/test-mvc/invites/{$final['slug']}");
    $writer = new PngWriter;
    $result = $writer->write($qr_code);
    $dirQrCodes = '/qrCode/' . date('Y') . '/' . date('m') . '/' . date('d');
    if(!is_dir(UPLOADS . $dirQrCodes)) {
      mkdir(UPLOADS . $dirQrCodes, 0755, true);
    }
    $file_pathQrCode = UPLOADS . "{$dirQrCodes}/qrCode_{$final['user_id']}_{$final['slug']}.png";
    $file_urlQrCode = "/uploads{$dirQrCodes}/qrCode_{$final['user_id']}_{$final['slug']}.png";
    if(is_null($result->saveToFile($file_pathQrCode))) {
      $data['qr_code_url'] = $file_urlQrCode;
    } else {
      $_SESSION['error'] = 'DB Error';
      error_log("[" . date('Y-m-d H:i:s') . "] Error upload qrcode" . PHP_EOL, 3, ERRORS_LOG_FILE);
      $iconsSet1 = getIcons('1');
      $styleFile = 'create.css';
      $oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
      $up_data = json_decode($oldData['invitation_data'], true);
      require VIEWS . '/templates/update.tpl.php';
    }
  } elseif($oldData['slug'] === $final['slug']) {
    $data['qr_code_url'] = $up_data['qr_code_url'];
  }
  
  $final['invitation_data'] = json_encode(array_filter($data));
  
  if($oldData['slug'] === $final['slug']) {
    if($db->query("UPDATE `event_data` SET invitation_data=? WHERE slug=?", [$final['invitation_data'], $final['slug']])) {
      $_SESSION['success'] = 'Приглашение обновлено';
    } else {
      $_SESSION['error'] = 'Ошибка. Попробуйте снова позже';
    }
  } else {
    if($db->query("UPDATE `event_data` SET slug=?, invitation_data=? WHERE id=?", [$final['slug'], $final['invitation_data'], $oldData['id']])) {
      $_SESSION['success'] = 'Приглашение обновлено';
    } else {
      $_SESSION['error'] = 'Ошибка. Попробуйте снова позже';
    }
  }
  redirect('/orders');
} else {
  $iconsSet1 = getIcons('1');
  $styleFile = 'create.css';
  $oldData = $db->query("SELECT * FROM `event_data` WHERE slug = ?", [$_POST['old_slug']])->findOrFail();
  $up_data = json_decode($oldData['invitation_data'], true);
  require VIEWS . '/templates/update.tpl.php';
}
