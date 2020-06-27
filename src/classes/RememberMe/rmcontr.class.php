<?php

namespace rememberme;

class rmContr extends rm {

  public function createRM($userID){


    //löscht vorhandene COOKIES
    if (isset($_COOKIE["RMtoken"])) {
      setcookie("RMtoken","",time() - 3600);
    }
    //löscht Datenbank einträge
    $this->deleteRM($userID);

    //verschlüsselt einen Token
    $ran = rand(1, 99999999);
    $token = dechex($ran);
    $hashToken = password_hash($token, PASSWORD_DEFAULT);

    //speichert den Token in die Datenbank
    $this->setRM($userID, $token);

    //Initialisiert die COOKIES
    setcookie("RMtoken", $hashToken, time() + (86400 * 30), "/");
    setcookie("RMID", $userID, time() + (86400 * 30), "/");



  }
  public function checkRM(){

    //Es wird überprüft, ob die COOKIES gesetzt sind
    if (isset($_COOKIE['RMtoken']) && isset($_COOKIE['RMID'])) {

      $userID = $_COOKIE['RMID'];

      //Es wird überprüft, ob die Informationen in der Datenbank mit den COOKIES übereinstimmen
      if ($this->getRMbyID($userID)) {

        $db_token = $this->getRMbyID($userID)[0]["token"];

        $hashed_token = $_COOKIE['RMtoken'];

        if (password_verify($db_token, $hashed_token)) {
          return true;
        }
      }

    }

  }


}
