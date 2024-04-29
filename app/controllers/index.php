<?php 

  /**
   * @var Db $db
   */

  $title = "Invitte";
  $styleFile = 'index.css';
  $scriptFile = 'index.js';
  $useSplitType = true;

  // $page = $_GET['page'] ?? 1;
  // $per_page = 2;
  // $total = db()->query("SELECT COUNT(*) FROM templates")->getColumn();
  // $pagination = new \myfrm\Pagination((int)$page, $per_page, $total);
  // $start = $pagination->getStart();
  // $posts = db()->query("SELECT * FROM templates ORDER BY id DESC LIMIT $start, $per_page")->findAll();
  
  $posts2 = db()->query("SELECT * FROM templates ORDER BY id ASC LIMIT 6")->findAll();
  
  if(check_auth()) {
    $likesEn = db()->query("SELECT liked from users WHERE id = ?", [$_SESSION['user']['id']])->getColumn();
    $likesDec = json_decode($likesEn);
    $likedTemplates = explode(":", $likesDec);
  }

  $loadTemplates = 'loadTemplates';

  require_once CONFIG . "/yoo.php";
  require_once VIEWS . "/index.tpl.php";