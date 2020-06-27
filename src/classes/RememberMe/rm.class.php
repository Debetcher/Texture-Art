<?php

namespace rememberme;

class rm extends \Database {


  protected function getRM(){

    $sql = "SELECT * FROM remember_me";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }
  protected function getRMbyID($userid){

    $sql = "SELECT * FROM remember_me WHERE user_id = $userid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }



  protected function updateRM($userID, $token){

    $sql = "UPDATE remember_me SET token= ? WHERE user_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$token, $userID]);


  }

  protected function deleteRM($userID){

    $sql = "DELETE FROM remember_me WHERE user_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userID]);


  }

  protected function setRM($userID, $token){

    $sql = "INSERT INTO remember_me(user_id, token)VALUES (?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userID, $token]);

  }







}
