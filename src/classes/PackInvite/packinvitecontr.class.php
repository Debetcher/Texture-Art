<?php

namespace PackInvite;

class PackInviteContr extends PackInvite {

  public function getPIBYPack($pack_id){

    return $this->db_getPIBYPack($pack_id);


  }

  public function getPIBYUsername($username){

    return $this->db_getPIBYUser($username);


  }

  public function acceptPI($invite_id){

    return $this->db_acceptPI($invite_id);


  }

  public function rejectPI($invite_id){

    return $this->db_rejectPI($invite_id);


  }

  public function setPI($user_id, $requested_id, $pack_id){

    return $this->db_setPI($user_id, $requested_id, $pack_id);


  }

  public function deletePI($invite_id){

    return $this->db_deletePI($invite_id);


  }








}
