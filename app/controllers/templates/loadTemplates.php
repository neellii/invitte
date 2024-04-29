<?php
$loadAfter = file_get_contents("php://input");
if(is_numeric($loadAfter)) {
  $moreTemplates = db()->query("SELECT * FROM templates WHERE id > ? ORDER BY id ASC LIMIT 10", [(int)$loadAfter])->findAll();
}
dump($moreTemplates);
