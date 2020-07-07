<?php

class FormValidator {

  private $data;
  private $errors = [];
  private $fields = ['username', 'email', 'password'];

  public function __construct($post_data){
    $this->data = $post_data;
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



      }
    }
      return $this->errors;


  }

  private function validateUsername(){

    $val = trim($this->data['username']);

    if(empty($val)){
      $this->addError('username', 'username cannot be empty');
    } else {
      if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
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
