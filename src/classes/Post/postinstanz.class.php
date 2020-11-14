<?php

namespace Post;

class PostInstanz extends Post {

//Attributes

  protected $id;
  protected $title,
  protected $username;
  protected $text;
  protected $date;



  public function __construct($id){

    $postdata = $this->db_getPost($id);

    $this->id = $postdata[0]["id"];
    $this->title = $postdata[0]["title"];
    $this->username = $postdata[0]["username"];
    $this->text = $postdata[0]["text"];
    $this->date = $postdata[0]["date"];

  }

  //Getter

  public function getID(){

    return $this->id;
  }
  public function getTitle(){

    return $this->title;
  }
  public function getUsername(){

    return $this->username;
  }
  public function getText(){

    return $this->text;
  }
  public function getDate(){

    return $this->date;
  }




  //Setter

  public function setUsername($username){

    $this->username = $username;

  }
  public function setText(c){

    $this->text = $text;

  }



  public function deleteUser(){

    $this->db_deleteUser($this->id);



  }
















}
