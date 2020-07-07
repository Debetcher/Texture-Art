<?php

namespace User;

class Creator extends UserView {

//Attributes

  private $description;
  private $banner;




  public function __construct($username){

    $userdata = $this->db_getCreator($username);

    $this->id = $userdata[0]["id"];
    $this->username = $userdata[0]["username"];
    $this->email = $userdata[0]["email"];
    $this->password = $userdata[0]["password"];
    $this->profile_picture = $userdata[0]["profile_picture"];
    $this->description = $userdata[0]["description"];
    $this->banner = $userdata[0]["banner"];


//Get Roles

    $rolectr = new \Role\RoleContr;
    $this->roles = $rolectr->getRole($this->getID());


  }

  //Getter

  public function getDesc(){

    return $this->description;
  }
  public function getBanner(){

    return $this->banner;
  }



  //Setter

  public function setDescription($desc){

    $this->description = $desc;

    $this->db_updateDesc($desc, $this->id);
  }


  public function setBanner($banner){

    $this->banner = $banner;

    $this->db_updateBanner($banner, $this->id);
  }













}
