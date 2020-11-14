<?php
session_start();

include "autoloader.php";


if (isset($_POST['submitLogin'])) {

//die Eingabe wird validiert.
$validation = new FormValidator($_POST);
$errors = $validation->validateForm();

//Falls die Validierung erfolgreich war, wird überprüft ob die Anmelde Date korrekt sind.
if ($errors == null) {

    $userC = new User\UserContr();

    //anmelde daten werden überprüft
    if ($userC->userLogin($_POST['username'],$_POST['password'])) {
      $userV = new User\UserView($_POST['username']);

      //RM Cookie wird erstellt
      if (isset($_POST['rm'])) {
        $rmC = new RememberMe\rmContr;
        $rmC->createRM( $userV->getID());
      }

      //User wird auf die Index.php weitergeleitet
      $_SESSION["username"] = $_POST['username'];
      header("Location:../index.php");

    }

  }




}
