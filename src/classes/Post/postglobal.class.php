<?php

namespace Post;

class PostGlobal extends Post {

  public function createPost($user_id, $title, $text){

    $this->db_setPost($user_id, $title, $text);

  }

  public function getPosts($username){

    return $this->db_getPosts($username);

  }







}
