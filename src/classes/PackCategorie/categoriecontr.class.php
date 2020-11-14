<?php

namespace PackCategorie;

class CategorieContr extends PackCategorie {

  public function getAllCategories(){

    return $this->db_getAllCategories();


  }
  public function getIDByName($name){

    return $this->db_getIDbyName($name);

  }





}
