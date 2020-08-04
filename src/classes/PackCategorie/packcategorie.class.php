<?php

namespace PackCategorie;

class PackCategorie extends \Database {


  protected function db_getAllCategories(){

    $sql = "SELECT name FROM pack_categorie";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;

  }
  protected function db_getIDbyName($name){

    $sql = "SELECT id FROM pack_categorie WHERE name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

    $results = $stmt->fetchAll();
    return $results;


  }







}
