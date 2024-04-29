<?php
require ROOT . "/vendor/autoload.php";
$settings = require_once CONFIG . '/rsvpSMTP.php';
$db = \myfrm\App::get(\myfrm\Db::class);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

preg_match("/https:\/\/cz82944.tw1.ru\/i\/(.*)/", $_SERVER['HTTP_REFERER'], $slug);
$postSlug = htmlspecialchars($_POST['slug']);

$eventInfo = $db->query("SELECT invitation_data FROM event_data WHERE slug = ?", [$postSlug ?? trim($slug[1])])->getColumn();
$infoArr = json_decode($eventInfo, true);

$fillable = ['attending', 'full_name', 'allergy_info', 'guests_number', 'guest_note'];
if(isset($infoArr['rsvp_ques'])) {
  foreach($infoArr['rsvp_ques'] as $k => $v) {
    array_push($fillable, htmlspecialchars(str_replace(" ", "", $v)));    
  }
}
$data = load($fillable);

$textBody = '<h2>Вам ответили в онлайн-приглашении</h2></br>';
$full_name = !empty($data['full_name']) ? "<p>Введите ваше Имя и Фамилию: {$data['full_name']}</p>" : '';
$attending = !empty($data['attending']) ? "<p>Сможете ли вы быть с нами в этот день?: {$data["attending"]}</p>" : '';
$guests_number = !empty($data['guests_number']) ? "<p>Планируете ли вы прийти один/одна или в сопровождении пары?: {$data['guests_number']}</p>" : '';
$allergy_info = !empty($data['allergy_info']) ? "<p>Есть ли у вас аллергия на какие-либо продукты?: {$data['allergy_info']}</p>" : '';
$guest_note = !empty($data['guest_note']) ? "<p>Примечание: {$data["guest_note"]}</p>" : '';
$rsvp_ques = '';
if(!empty($infoArr['rsvp_ques'])) {
  foreach($infoArr['rsvp_ques'] as $k => $v) {
    $rsvp_ques = $rsvp_ques . "<p>" . $v . ':' . $data[htmlspecialchars(str_replace(' ', '', $v))] . "</p>";
  }
}
$textBody = $textBody . $full_name . $attending . $guest_number . $allergy_info . $guest_note . $rsvp_ques;

if(send_rsvp($settings['mail_settings'], ['neellii.ni@gmail.com'], 'Ответ с онлайн-приглашения Invitte', $textBody)) {
  echo 'OK';
} else {
  echo 'Error';
}
