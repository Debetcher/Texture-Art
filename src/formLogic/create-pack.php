<?php
//
//
//
//
// if(isset($_POST['submit'])) {
//
// $validation_step = 0;
// //die Eingabe wird validiert.
//
//
// $validation = new FormValidator($_POST);
// $errors = $validation->validateForm();
//
// if ($_FILES['tp-file']['error'] == 0) {
//
//   $pack_val = new fileContr($_FILES['tp-file']);
//
//   $pack_val->validateFile(["png"], 1000000);
//
//
//
//
//
// }
//
// if ($_FILES['tp-picture']['error'] == 0) {
//
//   $pack_picture_val = new fileContr($_FILES['tp-picture']);
//
//   $pack_picture_val->validateFile(["png"], 1000000);
//
//
// }
//
//
// if ($errors == null && $pack_val->error == null && $pack_picture_val->error == null) {
//
//   //Pack wird in die Datenbank gespeichert
//   $packC = new Pack\PackContr;
//
//
//   if ($packC->checkIfPackExist($_POST['packname'], $_POST['packname-ig'], $_POST['description'])) {
//
//     //Das Pack wurde schon hochgeldaen
//     echo "Das pack wurde bereits hochgeladen";
//
//   }else {
//
//
//
//
//
//
//   $packC->setPack($_POST['packname'], $_POST['packname-ig'], $_POST['description'], "no path", "no path", $_POST['status'], $_POST['categorie'], $_POST['type'], $_POST['version']);
//
//   $pack_id = $packC->getIDByName($_POST['packname'])[0]['id'];
//
//   $pack_val->uploadFile($pack_id, "zip", "packs/");
//   $pack_picture_val->uploadFile($pack_id, "png", "img/pack-picture/");
//
//
//   $packInstanz = new Pack\PackInstanz($pack_id);
//
//   $packInstanz->updatePath("packs/" . $pack_id . ".zip");
//   $packInstanz->updatePackPicture("img/pack-picture/" . $pack_id . ".png");
//
//
//   //Der aktuelle Benutzer wird als Creator eingetragen
//   $userInstanz = new User\UserView($_SESSION['username']);
//
//   $packInstanz->setPackCreator($userInstanz->getID());
//
//
//
//
//
//
// }
//
//
// }
//
//
//
//
//
// }




 ?>
