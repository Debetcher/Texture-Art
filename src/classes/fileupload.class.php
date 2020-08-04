<?php



class FileUpload {


  public $errors = [];


  public function uploadPP($data){

    $file = $data;

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

  public function uploadBanner($data){

    $file = $data;

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
          addError("banner", "The File is to big");
        }
      }else{
        addError("banner", "There was an error");
      }
    }else {
      addError("banner", "You cannot upload files of this type");
    }
  }

  public function uploadPack($data, $name){

    $file = $data;

    $fileName = $file['name'];
    $fileTMP = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('zip');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 100000000) {

            $fileNameNew = $name.".zip";
            $fileDest = 'packs/'.$fileNameNew;
            move_uploaded_file($fileTMP, $fileDest);


        }else {
          echo "The file is too big";
        }
      }else{
        echo "There was an Error";
      }
    }else {
      $this->addError("pack", "You cannot upload files of this type");
    }
  }








  public function addError($key, $val){
    $this->errors[$key] = $val;
  }



  public function displayError($type){

    if (isset($this->errors['pack']) && $this->errors['pack'] != null) {
      ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $this->errors['pack'] ?? '' ?>
      </div>
      <?php
    }



  }


}

?>
