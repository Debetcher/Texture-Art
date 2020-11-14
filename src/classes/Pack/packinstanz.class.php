<?php

namespace Pack;

class PackInstanz extends Pack {

//Attributes

  protected $id;
  protected $name;
  protected $ingame_name;
  protected $creator;
  protected $description;
  protected $pack_picture;
  protected $path;
  protected $status;
  protected $categorie;
  protected $type;
  protected $version;



  protected $likes;
  protected $downloads;



  public function __construct($id){

    $packdata = $this->db_getPack($id);

    $this->id = $packdata[0]["id"];
    $this->name = $packdata[0]["name"];
    $this->ingame_name = $packdata[0]["ingame_name"];
    $this->description = $packdata[0]["description"];
    $this->pack_picture = $packdata[0]["pack_picture"];
    $this->path = $packdata[0]["path"];
    $this->status = $packdata[0]["status"];
    $this->categorie = $packdata[0]["categorie"];
    $this->type = $packdata[0]["type"];
    $this->version = $packdata[0]["version"];

    $this->likes = $packdata[0]["likes"];
    $this->downloads = $packdata[0]["downloads"];

    $packContr = new \Pack\PackContr();
    $this->creator = $packContr->getCreatorsByID($this->id);


  }

  //Getter

  public function getID(){

    return $this->id;
  }
  public function getName(){

    return $this->name;
  }
  public function getIGName(){

    return $this->ingame_name;
  }
  public function getCreator(){

    return $this->creator;
  }
  public function getDesc(){

    return $this->description;
  }
  public function getPackPicture(){

    return $this->pack_picture;
  }
  public function getPath(){

    return $this->path;
  }
  public function getLikes(){

    return $this->likes;
  }
  public function getDownloads(){

    return $this->downloads;
  }
  public function getStatus(){

    return $this->status;
  }
  public function getCat(){

    return $this->categorie;
  }
  public function getType(){

    return $this->type;
  }
  public function getVersion(){

    return $this->version;
  }





  //Setter

  //update


  public function updateName($value){

    $this->name = $value;
    return $this->db_updateName($value, $this->id);

  }

  public function updateIGName($value){

    $this->ingame_name = $value;
    return $this->db_updateIGName($value, $this->id);

  }

  public function updateDesc($value){

    $this->description = $value;
    return $this->db_updateDesc($value, $this->id);

  }

  public function updatePath($value){

    $this->path = $value;
    return $this->db_updatePath($value, $this->id);
  }

  public function updatePackPicture($value){

    $this->pack_picture = $value;
    return $this->db_updatePackPicture($value,  $this->id);
  }

  public function updateStatus($value){

    $this->status = $value;
    return $this->db_updateStatus($value,  $this->id);
  }

  public function updateCat($value){

    $this->categorie = $value;
    return $this->db_updateCat($value,  $this->id);
  }

  public function updateType($value){

    $this->type = $value;
    return $this->db_updateType($value,  $this->id);
  }

  public function updateVersion($value){

    $this->version = $value;
    return $this->db_updateVersion($value,  $this->id);
  }








  //updates by name


  public function updateStatusByName($value){

    $statusContr = new \PackStatus\StatusContr;
    $statusID = $statusContr->getIDByName($value);
    $this->status = $value;
    return $this->db_updateStatus($statusID,  $this->id);
  }

  public function updateCatByName($value){

    $CatContr = new \PackCategorie\CategorieContr;
    $categorieID = $CatContr->getIDByName($value);
    $this->categorie = $value;
    return $this->db_updateCat($categorieID,  $this->id);
  }

  public function updateTypeByName($value){

    $TypeContr = new \PackType\TypeContr;
    $typeID = $TypeContr->getIDByName($value);
    $this->type = $value;
    return $this->db_updateType($typeID,  $this->id);
  }

  public function updateVersionByName($value){

    $versionContr = new \PackVersion\VersionContr;
    $versionID = $versionContr->getIDByName($value);
    $this->version = $value;
    return $this->db_updateVersion($versionID,  $this->id);
  }





  //Creator

  public function setPackCreator($user_id){


    $this->db_setPackCreator($this->id , $user_id);


  }
  public function deletePackCreator($user_id){

    $this->db_setPackCreator($this->id , $user_id);

  }















}
