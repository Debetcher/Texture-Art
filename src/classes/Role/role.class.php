<?php

namespace Role;

class Role extends \Database {


  protected function db_getRoles(){

    $sql = "SELECT * FROM role";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }
  protected function db_getRolesByUser($user_id){

    $sql = "SELECT * FROM role
            JOIN user_role ON role.id = user_role.role_id
            JOIN user ON user_role.user_id = user.idea
            WHERE user.id = $user_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }

  protected function db_updateRole($id, $name){

    $sql = "UPDATE role SET name= ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $id]);

  }

  protected function db_deleteRole($id){

    $sql = "DELETE FROM role WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

  }

  protected function db_setRole($name){

    $sql = "INSERT INTO role(name)VALUES (?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

  }







}
