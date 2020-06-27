<?php

namespace User;

class UserContr extends User {

  public function createUser($username, $email, $password){

    $this->db_setUser($username, $email, $password);

  }

  //kontrolliert, ob Benutzername und Passwort mit einem Benutzer in der Datenbank übereinstimmt.


  public function userLogin($username, $password){

    if ($results = $this->db_getUser($username)) {
      if (password_verify($password, $results[0]['password'])) {
        return true;
      }else {
        return false;
      }
    }else {
        return false;
    }

  }

  public function isUsernameAvaiable($username){
    if ($results = $this->db_getUser($username)) {
      return false;
    }else {
      return true;
    }

  }
  public function isEmailAvaiable($email){

    if ($results = $this->db_getUserByEmail($email)) {
      return false;
    }else {
      return true;
    }


  }


}
