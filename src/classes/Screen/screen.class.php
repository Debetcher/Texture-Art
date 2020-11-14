<?php

namespace Screen;

class Screen extends \Database {


  protected function db_getScreensbyPackID($pack_id){

    $sql = "SELECT screen.id, pack_id, title, screen.description, screen.path FROM screen
            JOIN pack ON pack.id = screen.pack_id
            WHERE pack.id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$pack_id]);

    $results = $stmt->fetchAll();
    return $results;

  }

  protected function db_setScreen($pack_id, $path){

    $sql = "INSERT INTO screen(pack_id, path) VALUES (?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$pack_id, $path]);


  }


  protected function db_updatePath($path, $screen_id){

    $sql = "UPDATE screen SET path = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$path, $screen_id]);


  }
  protected function db_updateTitle($title, $screen_id){

    $sql = "UPDATE screen SET title = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $screen_id]);

  }
  protected function db_updateDescription($desc, $screen_id){

    $sql = "UPDATE screen SET description = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$desc, $screen_id]);

  }




  protected function db_deleteScreen(){



  }








}
