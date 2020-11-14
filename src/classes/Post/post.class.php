<?php

namespace Post;

class Post extends \Database {

  protected function db_getPosts($username){

    $sql = "SELECT user.username, post.title, post.text, post.date FROM post
            JOIN user ON post.user_id = user.id WHERE user.username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_getPost($id){

    $sql = "SELECT post.id, post.title, user.username, post.text, post.date FROM post
            JOIN user ON post.user_id = user.id WHERE post.id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    $results = $stmt->fetchAll();
    return $results;
  }


  protected function db_setPost($user_id, $title, $text){

    $sql = "INSERT INTO post(user_id, title, text) VALUES (?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id, $title, $text]);

  }

  protected function db_updatePost($id, $text){

    $sql = "UPDATE post SET text = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$text, $id]);


  }


  protected function db_deletePost($id){

    $sql = "DELETE FROM post WHERE id = >?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

  }





}
