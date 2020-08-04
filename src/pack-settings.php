
<!-- Includes  -->
    <?php include "includes/autoloader.inc.php" ?>
    <?php include "includes/header.inc.php" ?>

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

$pack_id = $_GET['pack'];

$packInstanz = new Pack\PackInstanz($pack_id);


################################################################################
################################################################################
// Update Pack name

if (isset($_POST['submitN'])) {

  //Validierung
  $validation = new FormValidator($_POST);

  $errors = $validation->validateForm();

  //upload

  if ($errors == null) {
    $packInstanz->updateName($_POST['packname']);
  }
}

################################################################################
################################################################################
// Update Pack name ingame

if (isset($_POST['submitIGN'])) {

  //Validierung
  $validation = new FormValidator($_POST);

  $errors = $validation->validateForm();


  //upload
  if ($errors == null) {
    $packInstanz->updateIGName($_POST['packname-ig']);
  }
}






################################################################################
################################################################################
// Update Description

if (isset($_POST['submitDesc'])) {

  //Validierung
  $validation = new FormValidator($_POST);

  $errors = $validation->validateForm();


  //upload
  if ($errors == null) {
    $packInstanz->updateDesc($_POST['description']);
  }
}





################################################################################
################################################################################
// Update Pack File

if (isset($_POST['submitTPFile'])) {

  //Validierung
  if ($_FILES['tp-file']['error'] == 0) {

    $tpFileContr = new FileContr($_FILES['tp-file']);

    $tpFileContr->validateFile(['png'], 10000000);

    if ($tpFileContr->error == null) {
      $tpFileContr->uploadFile($packInstanz->getID(), "zip", "packs/");

    }else {
      echo "tschüss";
    }

  }

}


################################################################################
################################################################################
// Update Pack Picture

if (isset($_POST['submitTPPicture'])) {

  //Validierung
  if ($_FILES['tp-picture']['error'] == 0) {

    $tpPictureContr = new FileContr($_FILES['tp-picture']);


    $tpPictureContr->validateFile(['png'], 10000000);

    if ($tpPictureContr->error == null) {
      $tpPictureContr->uploadFile($packInstanz->getID(), "png", "img/pack-picture/");


    }

  }

}


################################################################################
################################################################################
// Update Status

if (isset($_POST['submitStatus'])) {

  $packInstanz->updateStatusByName($_POST['status']);

}

################################################################################
################################################################################
// Update Status

if (isset($_POST['submitCategorie'])) {

  $packInstanz->updateCatByName($_POST['categorie']);

}

################################################################################
################################################################################
// Update Status

if (isset($_POST['submitType'])) {

  $packInstanz->updateTypeByName($_POST['type']);

}

################################################################################
################################################################################
// Update Status

if (isset($_POST['submitVersion'])) {

  $packInstanz->updateVersionByName($_POST['version']);

}





















 ?>


<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Texturepack name -->
<form method="post" class="formular1">

Texturepack name <br><br>

<input type="text" name="packname" class="form-control" value="<?php echo $packInstanz->getName(); ?>"> <br>

<!-- Fehlermeldung -->
<?php
if (isset($errors['packname'])) {
  $validation->displayError($errors['packname']);
}
 ?>
<br>
<input type="submit" name="submitN" value="Update" class="btn btn-primary"> <br>

</form>








<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Texturepack name Ingame -->

<form method="post" class="formular1">

Texturepack name ingame <br><br>

<input type="text" name="packname-ig" class="form-control" value="<?php echo $packInstanz->getIGName(); ?>"> <br>

<!-- Fehlermeldung -->
<?php
if (isset($errors['packname-ig'])) {
  $validation->displayError($errors['packname-ig']);
}
 ?>
<br>
<input type="submit" name="submitIGN" value="Update" class="btn btn-primary"> <br>

</form>




<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Description-->

<form method="post" class="formular1">

Description <br><br>

<textarea name="description" class="form-control"><?php echo $packInstanz->getDesc(); ?></textarea> <br>

<!-- Fehlermeldung -->
<?php
if (isset($errors['description'])) {
  $validation->displayError($errors['description']);
}
 ?>
<br>
<input type="submit" name="submitDesc" value="Update" class="btn btn-primary"> <br>

</form>






<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Texturepack File-->

<form method="post" class="formular1" enctype="multipart/form-data">

Texturepack File <br><br>

<div class="custom-file">
<input type="file" class="custom-file-input" name="tp-file" id="inputFile">
<label class="custom-file-label file_label_1" for="customFile">Choose file</label><br>
</div>

<!-- Fehlermeldung -->
<?php
if (isset($tpFileContr)) {
    echo "<br><br>";
    $tpFileContr->displayError();
}
 ?>
<br><br>
<input type="submit" name="submitTPFile" value="Update" class="btn btn-primary"> <br>

</form>










<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Texturepack Picture-->

<form method="post" class="formular1" enctype="multipart/form-data">

Texturepack Picture <br><br>

<div class="custom-file">
<input type="file" class="custom-file-input" name="tp-picture" id="inputFile2">
<label class="custom-file-label file_label_2" for="customFile">Choose file</label><br>
</div>

<!-- Fehlermeldung -->
<?php
if (isset($tpPictureContr)) {
    echo "<br><br>";
    $tpPictureContr->displayError();
}
 ?>

<!-- Preview -->
<br><br>
<img class="pack-settings-preview" src="<?php echo $packInstanz->getPackPicture(); ?>">

<br><br>


<input type="submit" name="submitTPPicture" value="Update" class="btn btn-primary"> <br>

</form>











<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Status-->
<form class="formular1" method="post">

  <div class="form-group form-drop-down">
    <label>Status</label>
    <select class="form-control" name="status">

      <?php
      $status = new Status\StatusContr;
      $status->getAllStatus();
      foreach ($status->getAllStatus() as $key => $value) {
        if ($value['name'] == $packInstanz->getStatus()) {
            echo "<option selected style='color:black;'>".$value['name']."</option>";
        }else {
          echo "<option style='color:black;'>".$value['name']."</option>";
        }
      }
       ?>


    </select>
  </div>
<input type="submit" name="submitStatus" value="Update" class="btn btn-primary"> <br>
</form>







<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Categorie-->
<form class="formular1" method="post">

  <div class="form-group form-drop-down">
    <label>Categorie</label>
    <select class="form-control" name="categorie">
      <?php
      $categorie = new PackCategorie\CategorieContr;
      $categorie->getAllCategories();
      foreach ($categorie->getAllCategories() as $key => $value) {
        if ($value['name'] == $packInstanz->getCat()) {
            echo "<option selected style='color:black;'>".$value['name']."</option>";
        }else {
          echo "<option style='color:black;'>".$value['name']."</option>";
        }
      }
       ?>
    </select>
  </div>
<input type="submit" name="submitCategorie" value="Update" class="btn btn-primary"> <br>
</form>







<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Version-->
<form class="formular1" method="post">

  <div class="form-group form-drop-down">
    <label>Version</label>
    <select class="form-control" name="version">

      <?php
      $version = new PackVersion\VersionContr;
      $version->getAllVersions();
      foreach ($version->getAllVersions() as $key => $value) {
        if ($value['name'] == $packInstanz->getVersion()) {
            echo "<option selected style='color:black;'>".$value['name']."</option>";
        }else {
          echo "<option style='color:black;'>".$value['name']."</option>";
        }



      }
       ?>



    </select>
  </div>
<input type="submit" name="submitVersion" value="Update" class="btn btn-primary"> <br>
</form>







<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Type-->
<form class="formular1" method="post">

  <div class="form-group form-drop-down">
    <label>Type</label>
    <select class="form-control" name="type">
      <?php
      $type = new PackType\TypeContr;
      $type->getAllTypes();
      foreach ($type->getAllTypes() as $key => $value) {
        if ($value['name'] == $packInstanz->getType()) {
            echo "<option selected style='color:black;'>".$value['name']."</option>";
        }else {
          echo "<option style='color:black;'>".$value['name']."</option>";
        }
      }
       ?>
    </select>
  </div>
<input type="submit" name="submitType" value="Update" class="btn btn-primary"> <br>
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


</html>
<?php include "includes/js-imports.inc.php" ?>
