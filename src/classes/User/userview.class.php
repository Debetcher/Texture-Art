<?php

namespace User;

class UserView extends User {

//Attributes

  protected $id;
  protected $username;
  protected $email;
  protected $password;
  protected $activation_key;
  protected $profile_picture;
  protected $roles;



  public function __construct($username){

    $userdata = $this->db_getUser($username);

    $this->id = $userdata[0]["id"];
    $this->username = $userdata[0]["username"];
    $this->email = $userdata[0]["email"];
    $this->password = $userdata[0]["password"];
    $this->activation_key = $userdata[0]["activation_key"];
    $this->profile_picture = $userdata[0]["profile_picture"];


//Get Roles

    $rolectr = new \Role\RoleContr;
    $this->roles = $rolectr->getRole($this->getID());


  }

  //Getter

  public function getID(){

    return $this->id;
  }
  public function getUserName(){

    return $this->username;
  }
  public function getEmail(){

    return $this->email;
  }
  public function getProfilePicture(){

    return $this->profile_picture;
  }
  public function getRoles(){

    return $this->roles;
  }


  //Setter

  public function setUsername($username){

    $this->username = $username;

    $this->db_updateUsername($username, $this->getID());
  }


  public function setEmail($email){

    $this->email = $email;

    $this->db_updateUsername($email, $this->getID());
  }
  public function setProfilePicture($profilePicture){

    $this->profile_picture = $profilePicture;

    $this->db_updatePP($profilePicture, $this->getID());
  }

//methods



  public function deleteUser(){

    $this->db_deleteUser($this->id);



  }

  public function isAuthorized($action){

    return $this-> db_authorization($action, $this->getID());

  }















}
