<?php

class FileUpload {

  private $data;
  private $errors = [];
  private $poss_ar = ['pp', 'banner', 'pack', 'screen'];
  private $poss;

  public function __construct($post_data, $poss){
    $this->data = $post_data;
    $this->poss = $poss;
  }

  public function upload(){

      if (in_array($this->poss, $this->poss_ar)) {

        if ($this->poss == 'pp') {
          $this->uploadPP();
        }
        if ($this->poss == 'banner') {
          $this->uploadBanner();
        }




      }

      return $this->errors;


  }

  private function uploadPP(){

    $file = $this->data;

    $fileName = $file['name'];
    $fileTMP = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
            $userV = new User\UserView($_SESSION['username']);

            $fileNameNew = $userV->getID().".png";

            $fileDest = 'img/profile-pictures/'.$fileNameNew;
            move_uploaded_file($fileTMP, $fileDest);

            $userV->setProfilePicture($fileNameNew);

        }else {
          echo "The file is too big";
        }
      }else{
        echo "There was an Error";
      }
    }else {
      echo "You cannot files of this type";
    }
  }

  private function uploadBanner(){

    $file = $this->data;

    $fileName = $file['name'];
    $fileTMP = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
            $creator = new User\Creator($_SESSION['username']);

            $fileNameNew = $creator->getID().".png";
            $fileDest = 'img/banner/'.$fileNameNew;
            move_uploaded_file($fileTMP, $fileDest);

            $creator->setBanner($fileDest);

        }else {
          echo "The file is too big";
        }
      }else{
        echo "There was an Error";
      }
    }else {
      echo "You cannot files of this type";
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
