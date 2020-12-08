
<?php

include "../formLogic/autoloader.php";



if (isset($_GET['file_path'])) {

  $dlContr = new PackDownload\DownloadContr;

  $pack_exp = explode("/", $_GET['file_path']);

  $pack_name_exp = explode(".", $pack_exp[count($pack_exp)-1]);

  $pack_id = $pack_name_exp[0];

  $packContr = new Pack\PackContr;

  $packIGName = $packContr->getPackById($pack_id)[0]['ingame_name'];



  $dlContr->setDownload($pack_id);

  $path = $_GET['file_path'];

  if (file_exists("../" . $path)) {

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename= $packIGName.zip");
    header("Content-Type: application/zip");
    header("Content-Transfer-Emcoding: binary");

    readfile("../" . $path);

    exit;

  }else {
    header("Location:../index.php");
  }

}else {
  header("Location:../index.php");
}


 ?>
