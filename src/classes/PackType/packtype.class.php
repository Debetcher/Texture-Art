<?php

namespace PackType;

class PackType extends \Database {


  protected function db_getAllTypes(){

    $sql = "SELECT name FROM pack_type";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }
  protected function db_getIDbyName($name){

    $sql = "SELECT id FROM pack_type WHERE name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

    $results = $stmt->fetchAll();
    return $results;


  }







}
