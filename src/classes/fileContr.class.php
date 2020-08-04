<?php



class FileContr {


  public $global_error;

  public $name;
  public $tmp_name;
  public $size;
  public $error;
  public $type;




  public function __construct($data){

    $this->name = $data['name'];
    $this->tmp_name = $data['tmp_name'];
    $this->size = $data['size'];
    $this->error = $data['error'];
    $this->type = $data['type'];



  }


  public function validateFile($fileTypes, $size){


    $fileExt = explode('.', $this->name);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = $fileTypes;


    if (in_array($fileActualExt, $allowed)) {
      if ($this->error === 0) {
        if ($this->size < $size) {



        }else {
          $this->error = "The File is too big";
        }
      }else{
        $this->error = "There was an error, please try it again";
      }
    }else {
      $this->error = "You cannot upload Files of this type";
    }

  }

  public function uploadFile($name, $ext, $dest){


    $filename = $name . "." . $ext;

    $file_destination = $dest . $filename;

    move_uploaded_file($this->tmp_name, $file_destination);




  }




  public function displayError(){

    if ($this->error != null) {
      ?>
      <div class="alert alert-danger" role="alert">
      <?php
      echo $this->name . " failed to upload! <br>";
      echo "Error: " . $this->error;?>
      </div>
      <?php
    }else {
      ?>
      <div class="alert alert-success" role="alert">
      <?php echo $this->name . " successfully uploadet"; ?>
      </div>
      <?php
    }



  }




}

?>
