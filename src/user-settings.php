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

<?php include "includes/side-bar.inc.php" ?>
</div>

<div class="content-main">

<!-- ############################################### -->
<!-- ############################################### -->
<!-- Start Content -->

<?php

$userV = new User\UserView($_SESSION["username"]);
$upload = new FileUpload();

if ($userV->isAuthorized("creator")) {
  $creator = new User\Creator($_SESSION["username"]);
}







//checks if image is uploadet

if (isset($_POST["submitPP"])) {

  $file = $_FILES['file'];

  $upload->uploadPP($file);


}

if (isset($_POST['submitUN'])) {

  $userV->setUsername($_POST['username']);
}

if (isset($_POST['submitEmail'])) {

  $userV->setEmail($_POST['email']);
}

if ($userV->isAuthorized("creator")) {

  if (isset($_POST['submitDesc'])) {

    $creator->setDescription($_POST['description']);
  }

  if (isset($_POST["submitBanner"])) {

    $file = $_FILES['file'];

    $upload = new FileUpload();
    $upload->uploadBanner($file);


  }

}





 ?>

<form method="post" class="formular1">
Username <br>
<input type="text" name="username" class="form-control" value="<?php echo $userV->getUserName(); ?>"> <br>
<input type="submit" name="submitUN" value="upload" class="btn btn-primary"> <br>

</form>
<form method="post" class="formular1">
Email <br>
<input type="text" name="email" class="form-control" value="<?php echo $userV->getEmail(); ?>"> <br>
<input type="submit" name="submitMail" value="upload" class="btn btn-primary"> <br>

</form>
<form method="post" enctype="multipart/form-data" class="formular1">
Profile Picture <br>
<input type="file" name="file"> <br>
<input type="submit" name="submitPP" value="upload" class="btn btn-primary"> <br>

</form>
<?php
if ($userV->isAuthorized("creator")) {
  ?>
  <form method="post" class="formular1">
  Description <br>
  <input type="text" name="description" class="form-control" value="<?php echo $creator->getDesc() ?>"> <br>
  <input type="submit" name="submitDesc" value="upload" class="btn btn-primary"> <br>

  </form>
  <form method="post" enctype="multipart/form-data" class="formular1">
  Banner <br>
  <input type="file" name="file"> <br>
  <input type="submit" name="submitBanner" value="upload" class="btn btn-primary"> <br>

  </form>
  <?php
}
 ?>







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
<?php include "includes/js-imports.inc.php" ?>

</html>
