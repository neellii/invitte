<?php
$db = \myfrm\App::get(\myfrm\Db::class);
$template_id = json_decode(file_get_contents('php://input'), true);

$likes = $db->query("SELECT liked FROM users where id=?", [$_SESSION['user']['id']])->getColumn();
dump($template_id);
if($likes === NULL && $db->query("UPDATE users SET liked=? WHERE id=?", [$template_id, $_SESSION['user']['id']])) {
    dump('success');
} elseif($likes !== NULL && is_numeric($template_id)) {
  $likesDecoded = json_decode($likes);
  $likedTemplates = explode(":", $likesDecoded);
  if(in_array($template_id, $likedTemplates)) {
    return false;
  } else {
    $pushLikes = json_encode($likesDecoded . ":" . $template_id);
    $db->query("UPDATE users SET liked=? WHERE id=?", [$pushLikes, $_SESSION['user']['id']]);
  }
} elseif($likes !== NULL) {
  $likesDecoded = json_decode($likes);
  dump($likesDecoded);
  $likedTemplates = explode(":", $likesDecoded);
  dump($likedTemplates);
  $template_replaced = str_replace("unlike", "", $template_id);
  foreach($likedTemplates as $k => $id) {
    if($template_replaced === $id) {
      unset($likedTemplates[$k]);
    }
  }
  dump($likedTemplates);
  if(count($likedTemplates) === 1 && !empty($likedTemplates[0])) {
    $db->query("UPDATE users SET liked=? WHERE id=?", [implode("", $likedTemplates), $_SESSION['user']['id']]);
  } elseif(empty($likedTemplates[0])) {
    $db->query("UPDATE users SET liked=? WHERE id=?", [NULL, $_SESSION['user']['id']]);
  } else {
    $likedReplaced = json_encode(implode(":", $likedTemplates));
    dump($likedReplaced);
    $db->query("UPDATE users SET liked=? WHERE id=?", [$likedReplaced, $_SESSION['user']['id']]);
  }
}


