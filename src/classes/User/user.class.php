<?php

namespace User;

class User extends \Database {

  protected function db_getUser($username){

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_getCreator($username){

    $sql = "SELECT id, username, email, password, profile_picture, description, banner FROM user
            JOIN profile ON user.id = profile.user_id WHERE username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);

    $results = $stmt->fetchAll();
    return $results;
  }


  protected function db_getAllUser(){

    $sql = "SELECT user.id, user.username, user.email, role.name FROM user
            LEFT JOIN user_role ON user.id = user_role.user_id
            LEFT JOIN role ON role.id = user_role.role_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }


  protected function db_getUserByEmail($email){

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_getUserByID($id){

    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_getUserByUsername($username){

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_setUser($username, $email, $password){


    $sql = "INSERT INTO user(username, email, password)VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $email, $password]);

  }

  protected function db_updateUsername($value, $id){

    $sql = "UPDATE user SET username = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }
  protected function db_updateEmail($value, $id){

    $sql = "UPDATE user SET email = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }
  protected function db_updatePP($value, $id){

    $sql = "UPDATE user SET profile_picture = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }
  protected function db_updateDesc($value, $id){

    $sql = "UPDATE profile SET description = ? WHERE user_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }
  protected function db_updateBanner($value, $id){

    $sql = "UPDATE profile SET banner = ? WHERE user_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }

  protected function db_deleteUser($id){

    $sql = "DELETE FROM user WHERE id = >?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

  }


  //Authorisation for actions

  protected function db_authorization($action, $user_id){

    $sql = "SELECT COUNT(user.id) AS bool FROM user
            JOIN user_role ON user.id = user_role.user_id
            JOIN role ON user_role.role_id = role.id
            JOIN role_action ON role_action.role_id = role.id
            JOIN action ON role_action.action_id = action.id
            WHERE action.name = ? AND user.id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$action, $user_id]);

    $results = $stmt->fetchAll();
    return $results[0]["bool"];

  }





  //user searching algo.

  protected function db_searchUsers($value){
    $value = $value . '%';

    $sql = "SELECT user.id, user.username, user.profile_picture, user.email, role.name FROM user
            LEFT JOIN user_role ON user.id = user_role.user_id
            LEFT JOIN role ON role.id = user_role.role_id
            WHERE user.username LIKE ?
            LIMIT 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value]);

    $results = $stmt->fetchAll();
    return $results;
  }


}
