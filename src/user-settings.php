
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

<?php include "includes/side-bar.inc.php" ?>
</div>

<div class="content-main">

<!-- ############################################### -->
<!-- ############################################### -->
<!-- Start Content -->

<?php

$userV = new User\UserView($_SESSION["username"]);


$creator = new User\Creator($_SESSION["username"]);




//checks if image is uploadet

if (isset($_POST["submitPP"])) {

  $file = $_FILES['file'];

  $upload = new FileUpload($file, "pp");
  $upload->upload();


}
if (isset($_POST["submitBanner"])) {

  $file = $_FILES['file'];

  $upload = new FileUpload($file, "banner");
  $upload->upload();


}

if (isset($_POST['submitUN'])) {

  $userV->setUsername($_POST['username']);
}

if (isset($_POST['submitDesc'])) {

  $creator->setDescription($_POST['description']);
}

if (isset($_POST['submitEmail'])) {

  $userV->setEmail($_POST['email']);
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
<form method="post" class="formular1">
Description <br>
<input type="text" name="description" class="form-control" value="<?php echo $creator->getDesc() ?>"> <br>
<input type="submit" name="submitDesc" value="upload" class="btn btn-primary"> <br>

</form>
<form method="post" enctype="multipart/form-data" class="formular1">
Profile Picture <br>
<input type="file" name="file"> <br>
<input type="submit" name="submitPP" value="upload" class="btn btn-primary"> <br>

</form>
<form method="post" enctype="multipart/form-data" class="formular1">
Banner <br>
<input type="file" name="file"> <br>
<input type="submit" name="submitBanner" value="upload" class="btn btn-primary"> <br>

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
