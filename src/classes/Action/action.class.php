<?php

namespace Action;

class Action extends \Database {




  protected function db_getActions(){

    $sql = "SELECT * FROM action";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }
  protected function db_getActionsbyRole($role_id){

    $sql = "SELECT * FROM action
            JOIN role_action ON action.id = role_action.action_id
            JOIN role ON action_role.role_id = role.id
            WHERE role.id = $role_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }

  protected function db_updateAction($id, $name){

    $sql = "UPDATE action SET name= ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $id]);

  }

  protected function db_deleteAction($id){

    $sql = "DELETE FROM action WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

  }

  protected function db_setAction($name){

    $sql = "INSERT INTO action(name)VALUES (?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

  }










}
