<?php
require ROOT . "/vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use myfrm\Validator;
$db = \myfrm\App::get(\myfrm\Db::class);
/**
 * @var \myfrm\Db $db
*/

$fillable = ['groom_name', 'bride_name', 'to_whom', 'party_date', 'place', 'slug', 'event_id', 'date_timer', 'hashtag', 'note', 'contacts', 'contacts_url', 'full_name', 'attending', 'guests_number', 'allergy_info', 'guest_note', 'og_title', 'og_desc', 'programm_name', 'programm_time', 'programm_place', 'programm_icon', 'hex_color', 'rsvp_ques', 'policy'];

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
    'unique' => 'event_data:slug',
    'slug' => true,
    'min' => 2,
    'max' => 255
  ],
  'event_id' => [
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
  ],
  'policy' => [
    'required' => true
  ]
];

$validator = new Validator();
$validation = $validator->validate($data, $rules);

if(!$validation->hasErrors()) {
  
  if(!empty($data['couple_img']['name'])) {
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
      require VIEWS . '/templates/create.tpl.php';
      die();
    }
  } else {
    unset($data['couple_img']);
  }

  if(!empty($data['og_image']['name'])) {
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
      require VIEWS . '/templates/create.tpl.php';
      die();
    }
  } else {
    unset($data['og_image']);
  }

  $qr_code = QrCode::create("http://localhost/test-mvc/invites/{$data['slug']}");
  $writer = new PngWriter;
  $result = $writer->write($qr_code);
  $dirQrCodes = '/qrCode/' . date('Y') . '/' . date('m') . '/' . date('d');
  if(!is_dir(UPLOADS . $dirQrCodes)) {
    mkdir(UPLOADS . $dirQrCodes, 0755, true);
  }
  $file_pathQrCode = UPLOADS . "{$dirQrCodes}/qrCode_{$data['user_id']}_{$data['slug']}.png";
  $file_urlQrCode = "/uploads{$dirQrCodes}/qrCode_{$data['user_id']}_{$data['slug']}.png";
  if(is_null($result->saveToFile($file_pathQrCode))) {
     $data['qr_code_url'] = $file_urlQrCode;
  } else {
    $_SESSION['error'] = 'DB Error';
    error_log("[" . date('Y-m-d H:i:s') . "] Error upload qrcode" . PHP_EOL, 3, ERRORS_LOG_FILE);
    require VIEWS . '/templates/create.tpl.php';
    die();
  }

  $keys = ['event_id', 'slug'];
  $final = array_intersect_key($data, array_fill_keys($keys, '1'));
  unset($data['event_id'], $data['slug']);
  foreach($data as $k => &$v) {
    if(is_array($v) && count($v) === 1 && $v[1] === "") {
        unset($data[$k]);
    }
  }
  $final['invitation_data'] = json_encode(array_filter($data));

  if($db->query("UPDATE `event_data` SET slug = :slug, invitation_data = :invitation_data WHERE id = :event_id", 
    $final
  )) {
    $_SESSION['success'] = 'Приглашение успешно создано!';
  } else {
    $_SESSION['error'] = 'Что-то пошло не так. Попробуйте снова позже';
  }
  redirect('orders');
} else {
  $iconsSet1 = getIcons('1');
  $styleFile = 'create.css';
  require VIEWS . '/templates/create.tpl.php';
}
