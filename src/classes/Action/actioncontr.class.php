<?php

namespace Action;

class ActionContr extends Action {

  public function getAction($role_id){

    return $this->db_getActions($role_id);


  }

  public function setAction($name){

    $this->db_setAction($name);

  }

  public function updateAction($id, $new_name){

    $this->db_updateAction($id, $new_name);

  }

  public function deleteAction($id){

    $this->db_deleteAction($id);

  }



}
