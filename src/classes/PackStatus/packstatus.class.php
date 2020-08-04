<?php

namespace PackStatus;

class PackStatus extends \Database {


  protected function db_getAllStatus(){

    $sql = "SELECT name FROM pack_status";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }

  protected function db_getIDbyName($name){

    $sql = "SELECT id FROM pack_status WHERE name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

    $results = $stmt->fetchAll();
    return $results;


  }










}
