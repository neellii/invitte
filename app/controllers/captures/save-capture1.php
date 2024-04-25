<?php
$img = $_POST["upward{$_SESSION['user']['id']}"];
$img = explode(';', $img)[1];
$img = explode(",", $img)[1];
$img = str_replace(" ", "+", $img);
$img = base64_decode($img);

file_put_contents(WWW . "/invitations/temp/upward{$_SESSION['user']['id']}.jpeg", $img);

$img2 = $_POST["backward{$_SESSION['user']['id']}"];
$img2 = explode(';', $img2)[1];
$img2 = explode(",", $img2)[1];
$img2 = str_replace(" ", "+", $img2);
$img2 = base64_decode($img2);

file_put_contents(WWW . "/invitations/temp/backward{$_SESSION['user']['id']}.jpeg", $img2);

//$files = ["http://localhost/test-mvc/public/invitations/temp/backward{$_SESSION['user']['id']}.jpeg", "http://localhost/test-mvc/public/invitations/temp/upward{$_SESSION['user']['id']}.jpeg"];

$files = ["../public/invitations/temp/backward{$_SESSION['user']['id']}.jpeg", "../public/invitations/temp/upward{$_SESSION['user']['id']}.jpeg"];

$zipname = 'images.zip';
$zip = new ZipArchive;
$res = $zip->open($zipname, ZipArchive::OVERWRITE | ZipArchive::CREATE);

if($res === TRUE) {
  foreach($files as $file) {
    $content = file_get_contents($file);
    $zip->addFromString(pathinfo($file, PATHINFO_BASENAME), $content);
    unlink($file);
  }
  $zip->close();
} else {
  echo 'failed';
}
ob_end_clean();
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
header('Set-Cookie: fileLoading=true'); 
readfile($zipname);