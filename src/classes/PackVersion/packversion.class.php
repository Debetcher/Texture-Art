<?php

namespace PackVersion;

class PackVersion extends \Database {


  protected function db_getAllVersions(){

    $sql = "SELECT name FROM pack_version";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }
  protected function db_getIDbyName($name){

    $sql = "SELECT id FROM pack_version WHERE name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

    $results = $stmt->fetchAll();
    return $results;


  }







}
