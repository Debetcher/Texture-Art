<?php

class FormValidator {

  private $data;
  private $errors = [];
  private $fields = ['username', 'email', 'password', 'packname','packname-ig', 'description'];

  public function __construct($post_data){
    $this->data = $post_data;
  }

  public function changeFields($fields){
    $this->fields = $fields;

  }

  public function validateForm(){

    foreach ($this->data as $key => $value) {

      if (in_array($key, $this->fields)) {

        if ($key == 'username') {
          $this->validateUsername();

        }
        else if ($key == 'email') {
          $this->validateEmail();
        }
        else if ($key == 'password') {
          $this->validatePassword();
        }
        else if ($key == 'packname') {
          $this->validatePackName();
        }
        else if ($key == 'packname-ig') {
          $this->validatePackNameIG();
        }
        else if ($key == 'description') {
          $this->validateDesc();
        }





      }
    }
      return $this->errors;


  }

  private function validateUsername(){

    $val = trim($this->data['username']);

    if(empty($val)){
      $this->addError('username', 'username cannot be empty');
    } else {
      if(!preg_match('/^[a-zA-Z0-9 ]{3,20}$/', $val)){
        $this->addError('username','username must be 6-12 chars & alphanumeric');
      }
    }



  }

  private function validateEmail(){

    $val = trim($this->data['email']);

    if(empty($val)){
      $this->addError('email', 'email cannot be empty');
    } else {
      if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
        $this->addError('email', 'email must be a valid email address');
      }
    }

  }

  private function validatePassword(){

    $val = trim($this->data['password']);

    if(empty($val)){
      $this->addError('password', 'password cannot be empty');
    } else {
      if(!preg_match('/^.{6,20}$/', $val)){
        $this->addError('password','password must be 6-12 chars');
      }
      else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{6,20}$/', $val)){
        $this->addError('password','password must contain 1 lowercalse and 1 uppercase');
      }
    }

  }
  private function validatePackName(){

    $val = trim($this->data['packname']);

    if(empty($val)){
      $this->addError('packname', 'Texturepack name cannot be empty');
    } else {
      if(!preg_match('/^[ A-Za-z0-9_@.#&+()]{3,30}$/', $val)){
        $this->addError('packname','Texturepack name must be 3-20 chars & alphanumeric');
      }
    }

  }
  private function validatePackNameIG(){

    $val = trim($this->data['packname-ig']);

    if(empty($val)){
      $this->addError('packname-ig', 'Texturepack ingame name cannot be empty');
    } else {
      if(!preg_match('/^[ A-Za-z0-9_@.#&+()]{3,30}$/', $val)){
        $this->addError('packname-ig','Texturepack ingame name must be 3-30 chars & alphanumeric');
      }
    }

  }
  private function validateDesc(){

    $val = trim($this->data['description']);

    if(empty($val)){
      $this->addError('description', 'Description cannot be empty');
    } else {
      if(!preg_match('/^[a-zA-Z0-9 ]{5,200}$/', $val)){
        $this->addError('description','Description must be 5-200 chars & alphanumeric');
      }
    }

  }






  public function addError($key, $val){
    $this->errors[$key] = $val;
  }



  public function displayError($errors){

    if (isset($errors) && $errors != null) {
      ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $errors ?? '' ?>
      </div>
      <?php
    }



  }






}
?>
