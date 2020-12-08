<?php

namespace PackDownload;

session_start();

class DownloadContr extends PackDownload {

  public function setDownload($pack_id){

    if ($_SESSION['username']) {

      $userContr = new \User\UserContr;

      $user_id = $userContr->getUserByUsername($_SESSION['username'])[0]['id'];

      if ($this->downloadNotExist($user_id, $pack_id)) {

        $this->db_setDownload($user_id, $pack_id);

      }

    }


  }

  public function downloadNotExist($user_id, $pack_id){

    if ($this->db_getDownload($user_id, $pack_id) == null) {
      return true;
    }else {
      return false;
    }


  }




}
