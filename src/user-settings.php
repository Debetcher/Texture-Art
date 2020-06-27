
<!-- Includes  -->
<?php include "includes/autoloader.inc.php" ?>
<?php include "includes/header.inc.php" ?>


<!-- checkt ob benutzer angemeldet ist -->

<?php

if (!isset($_SESSION["username"])) {
  header("Location:index.php");
}


 ?>




<!-- Grid Layout -->
<div class="grid-layout">

<div class="top-bar">
<?php include "includes/top-bar.inc.php" ?>
</div>

<div class="content-left">
<!-- freier Bereich, der evtl für Side Bar genutzt wird -->
</div>

<div class="content-main">

<!-- ############################################### -->
<!-- ############################################### -->
<!-- Start Content -->

<?php

$userV = new User\UserView($_SESSION["username"]);

echo $userV->getUserName();




//checks if image is uploadet

if (isset($_POST["submit"])) {

  $file = $_FILES['file'];

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

          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDest = 'img/profile-pictures/'.$fileNameNew;

          move_uploaded_file($fileTMP, $fileDest);


          //Datenbank wird geupdated

          $userV->setUsername($_POST['username']);
          $userV->setEmail($_POST['email']);
          $userV->setProfilePicture($fileDest);
          $userV->updateUser();




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





 ?>

<form method="post" enctype="multipart/form-data" class="formular1">
Username <br>
<input type="text" name="username" class="form-control" value="<?php echo $userV->getUserName(); ?>"> <br>
Email <br>
<input type="text" name="email" class="form-control" value="<?php echo $userV->getEmail(); ?>"> <br>
Profile Picture <br>
<input type="file" name="file"> <br>
<input type="submit" name="submit" value="upload" class="btn btn-primary"> <br>

</form>







<!-- End Content -->
<!-- ############################################### -->
<!-- ############################################### -->

</div>

<div class="content-right">
<!-- freier Bereich für Werbung etc -->
</div>

<div class="footer">
<?php include "includes/footer.inc.php" ?>
</div>


</div>



<!-- JS Import -->
<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Popper CDN -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!-- Main JS -->
<script src="./js/main.min.js"></script>

</html>
