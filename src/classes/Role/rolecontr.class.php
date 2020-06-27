<?php

namespace Role;

class RoleContr extends Role {

  public function getRole($user_id){

    return $this->db_getRoles($user_id);


  }

  public function setRole($name){

    $this->db_setRole($name);

  }

  public function updateRole($id, $new_name){

    $this->db_updateRole($id, $new_name);

  }

  public function deleteRole($id){

    $this->db_deleteRole($id);

  }


}
