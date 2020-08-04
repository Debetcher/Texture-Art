<?php
namespace Pack;



class PackContr extends Pack{

  public function getPacks(){

    return $this->db_getPacks();

  }
  public function getIDByName($name){

    return $this->db_getIDbyName($name);

  }



  public function getCreatorsByID($id){

    return $this->db_getCreators($id);

  }





  public function setPack($name, $ingame_name, $description, $pack_picture, $path, $status, $categorie, $type, $version){

    $status_obj = new \PackStatus\StatusContr;
    $status_id = $status_obj->getIDByName($status)[0]['id'];

    $categorie_obj = new \PackCategorie\CategorieContr;
    $categorie_id = $categorie_obj->getIDByName($categorie)[0]['id'];

    $type_obj = new \PackType\TypeContr;
    $type_id = $type_obj->getIDByName($type)[0]['id'];

    $version_obj = new \PackVersion\VersionContr;
    $version_id = $version_obj->getIDByName($version)[0]['id'];



    $this->db_setPack($name, $ingame_name, $description, $pack_picture, $path, $status_id, $categorie_id, $type_id, $version_id);




  }










}
