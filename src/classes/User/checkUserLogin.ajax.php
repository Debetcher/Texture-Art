<?php
include "../database.class.php";
include "user.class.php";
include "usercontr.class.php";

$userC = new User\UserContr;


//Username existiert
    if (isset($_POST["usernameExist"])) {
      if (!$userC->isUsernameAvaiable($_POST["usernameExist"])) {
        echo true;
      }else {
        echo false;
      }
    }

//Username existiert
    if (isset($_POST["usernameAvailable"])) {
      echo $userC->isUsernameAvaiable($_POST["usernameAvailable"]);

    }
//Username existiert
    if (isset($_POST["emailAvailable"])) {
      echo $userC->isEmailAvaiable($_POST["emailAvailable"]);
    }


//login Daten stimmen überein
    if (isset($_POST["login_username"]) && isset($_POST["login_password"])) {
      echo $userC->userLogin($_POST["login_username"], $_POST["login_password"]);
    }
