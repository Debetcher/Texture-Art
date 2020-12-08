<?php

namespace PackDownload;

class PackDownload extends \Database {


  protected function db_setDownload($user_id, $pack_id) {

    $sql = "INSERT INTO user_download_pack(user_id, pack_id) VALUES (?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id, $pack_id]);

  }

  protected function db_getDownload($user_id, $pack_id){

    $sql = "SELECT * FROM user_download_pack WHERE user_id = ? AND pack_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id, $pack_id]);

    $results = $stmt->fetchAll();
    return $results;

  }

  










}
