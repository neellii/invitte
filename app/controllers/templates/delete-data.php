<?php

$db = \myfrm\App::get(\myfrm\Db::class);

$invData = $db->query("SELECT invitation_data FROM event_data WHERE id = ?", [$_POST['event_id']])->getColumn();
$data = json_decode($invData, true);

if(isset($data['couple_img'])) {
  if(unlink(WWW . $data['couple_img'])) {
    dump('couple_img deleted');
  }
  
}

if(isset($data['og_image'])) {
  if( unlink(WWW . $data['og_image'])) {
    dump('og_image deleted');
  }
}

if(isset($data['qr_code_url'])) {
  if(unlink(WWW . $data['qr_code_url'])) {
    dump('qr_code deleted');
  }
}

$db->query("DELETE FROM event_data WHERE id = ?", [$_POST['event_id']]);

redirect('/orders');