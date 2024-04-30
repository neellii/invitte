<?php

use myfrm\App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function dump($data) {
  echo "<pre>";
    var_dump($data);
  echo "</pre>";
}

function print_arr($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}

function dd($data) {
  dump($data);
  die;
}

function abort($code = 404, $title = '404 - Not found') {
  http_response_code($code);
  require VIEWS . "/errors/{$code}.tpl.php";
  die;
}

function load($fillable = [], $post = true) {
  $load_data = $post ? $_POST : $_GET;
  $data = [];

  foreach($fillable as $name) {
    if(isset($load_data[$name])) {
      if(!is_array($load_data[$name])) {
        $data[$name] = htmlSpecial(trim($load_data[$name]));
      } else {
        $data[$name] = $load_data[$name];
        foreach($data[$name] as $key => &$value) {
          $value = htmlSpecial(trim($value));
        }
      }
    } else {
      $data[$name] = "";
    }
  }
  return $data;
}

function old($fieldname) {
  return isset($_POST[$fieldname]) ? htmlSpecial($_POST[$fieldname]) : '';
}

function htmlSpecial($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

function redirect($url = '') {
  if($url) {
    $redirect = $url;
  } else {
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
  }

  header("Location: {$redirect}");
  die;
}

function get_alerts() {
  if(!empty($_SESSION['success'])) {
    require_once VIEWS . '/incs/alert_success.php';
    unset($_SESSION['success']);
  } 
  if(!empty($_SESSION['error'])) {
    require_once VIEWS . '/incs/alert_error.php';
    unset($_SESSION['error']);
  } 
}

function db(): \myfrm\Db {
  return \myfrm\App::get(\myfrm\Db::class);
}

function check_auth() {
  return isset($_SESSION['user']);
}

function getFileExt($file_name) {
  $file_ext = explode('.', $file_name);
  return end($file_ext);
}

function routeParams(): array {
  return \myfrm\Router::$route_params;
} 

function routeParam(string $key, $default = null) {
  return \myfrm\Router::$route_params[$key] ?? $default;
}

function array_slice_assoc($array, $keys) {
  return array_intersect_key($array, array_flip($keys));
}

function getTemplate($template_id) {
  return require VIEWS . "/invitations/template-{$template_id}.tpl.php";
}

function deleteArrValues($array, $deleteArr) {
  foreach($deleteArr as $key => $value) {
    if(array_key_exists($value, $array)) {
      unset($array[$value]);
    }
  }
  return $array;
}

function getIcons($int) {
  ${'iconsSet' . $int} = [];
  foreach(new DirectoryIterator(WWW . "/invitations/icons_set{$int}") as $icon) {
    if($icon->isFile()) {
     array_push(${'iconsSet' . $int}, $icon->getFilename());
    }
  }
  return ${'iconsSet' . $int};
}

function send_rsvp(array $mail_settings, array $to, string $subject, string $body) {
  $mail = new PHPMailer();
  try {
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                            
    $mail->Host       = $mail_settings['host'];               
    $mail->SMTPAuth   = $mail_settings['auth'];
    $mail->Username   = $mail_settings['username'];                     
    $mail->Password   = $mail_settings['password'];                              
    $mail->SMTPSecure = $mail_settings['secure'];           
    $mail->Port       = $mail_settings['port'];
    $mail->CharSet = $mail_settings['charset'];

    $mail->setFrom($mail_settings['from_email'], $mail_settings['from_name']);
    foreach($to as $email) {
      $mail->addAddress($email);
    }

    $mail->isHTML($mail_settings['is_html']);
    $mail->Subject = $subject;
    $mail->Body = $body;
    return $mail->send();
  } catch(Exception $e) {
    return false;
  }
}