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

  protected function db_getUserByEmail($email){

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_setUser($username, $email, $password){

    $sql = "INSERT INTO user(username, email, password)VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $email, $password]);

  }

  protected function db_updateUser($id, $username, $email, $profilePicture, $password){

    $sql = "UPDATE user SET username = ? , email = ? , password = ? , profile_picture = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $email, $password, $profilePicture, $id]);


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


}
