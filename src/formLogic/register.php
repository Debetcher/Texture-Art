<?php
session_start();

include "autoloader.php";


if (isset($_POST['submitRegister'])) {

//die Eingabe wird validiert.
$validation = new FormValidator($_POST);
$errors = $validation->validateForm();


//Falls die Validierung erfolgreich war, werden die eingegebenen Daten überprüft

if ($errors == null) {
    $userC = new User\UserContr();

    if (!$userC->isUsernameAvaiable($_POST['username'])) {
      $validation->addError("username", "username is no avaible");
      $errors = $validation->validateForm();
      echo "3";
    }else if (!$userC->isEmailAvaiable($_POST['email'])) {
      $validation->addError("email", "email is not avaiable");
      $errors = $validation->validateForm();
      echo "4";

    }else{
      //verschlüsseln
      $hashPW = password_hash($_POST["password"], PASSWORD_DEFAULT);
      echo "5";


      //Nachdem alle Daten überprüft wurden, wird der Benutzer in die Datenbank eingetragen
      $userC->createUser($_POST["username"],$_POST["email"],$hashPW);
      $_SESSION["username"] = $_POST['username'];
      header("Location:../index.php");
    }
  }else {
    echo "2";
  }
}else {
  echo "1";
}

 ?>
