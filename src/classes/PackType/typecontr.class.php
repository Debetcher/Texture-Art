<?php

namespace PackType;

class TypeContr extends PackType {

  public function getAllTypes(){

    return $this->db_getAllTypes();


  }
  public function getIDByName($name){

    return $this->db_getIDbyName($name);

  }



}
