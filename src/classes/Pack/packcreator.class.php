<?php
namespace Pack;



class PackCreator extends Pack{

  public function getPacks(){

    return $this->db_getPacks();

  }
  public function getIDByName($name){

    return $this->db_getIDbyName($name);

  }





}
