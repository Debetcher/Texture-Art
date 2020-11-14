<?php

namespace PackVersion;

class VersionContr extends PackVersion {

  public function getAllVersions(){

    return $this->db_getAllVersions();


  }
  public function getIDByName($name){

    return $this->db_getIDbyName($name);

  }



}
