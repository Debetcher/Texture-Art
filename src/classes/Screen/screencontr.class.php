<?php

namespace Screen;

class ScreenContr extends Screen {

  public function getScreensbyPackID($pack_id){

  return $this->db_getScreensbyPackID($pack_id);

  }

  public function setScreen($pack_id, $path){

  return $this->db_setScreen($pack_id, $path);


  }


  public function updatePath($path, $screen_id){

  return $this->db_updatePath($path, $screen_id);

  }
  public function updateTitle($title, $screen_id){

  return $this->db_updateTitle($title, $screen_id);

  }
  public function updateDescription($desc, $screen_id){

  return $this->db_updateDescription($desc, $screen_id);

  }



}
