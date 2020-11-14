<?php

namespace PackStatus;

class StatusContr extends PackStatus {

  public function getAllStatus(){

    return $this->db_getAllStatus();


  }

  public function getIDByName($name){

    return $this->db_getIDbyName($name);

  }



}
