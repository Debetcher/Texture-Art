
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
<!-- Formular Creator Collab -->
<form method="post" class="formular1">

Invite Creators <br><br>

<input type="text" name="username" class="form-control" data-parsley-username-exist> <br>

<input type="submit" name="submitIC" value="Invite" class="btn btn-primary"> <br> <br>


<?php

if (isset($_POST['submitIC'])) {



  $piContr = new PackInvite\PackInviteContr;
  $userContr = new User\UserContr;

  $session = $userContr->getUserByUsername($_SESSION['username'])[0]['id'];
  $post = $userContr->getUserByUsername($_POST['username'])[0]['id'];

  $piContr->setPI($post, $session, $pack_id);



}



 ?>






Invited Creators <br> <br>


<table class="table table-striped table-dark ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $piContr = new PackInvite\PackInviteContr;

    foreach ($piContr->getPIBYPack($pack_id) as $key => $value) {
      ?>
      <tr>
        <th scope="row"><?php echo $key+1; ?></th>
        <td><?php echo $value["username"]; ?></td>
        <td>waiting...</td>
        <td>
          <input type="button" name="withdraw" value="revoke" class=" table-btn btn-danger">
        </td>
      </tr>
      <?php
    }


     ?>

  </tbody>
</table>


<br>


Members <br> <br>


<table class="table table-striped table-dark ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($packInstanz->getCreator() as $key => $value) {
        ?>
        <tr>
          <th scope="row"><?php echo $key+1; ?></th>
          <td><?php echo $value["username"]; ?></td>
          <td>
            <input type="button" name="kick" value="kick" class=" table-btn btn-danger">



          </td>
        </tr>
        <?php
      }


     ?>

  </tbody>
</table>




</form>






<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Texturepack name Ingame -->

<form method="post" class="formular1">

Texturepack name ingame <br><br>

<div class="IG-settings-container">
  <div class="IG-colors-container">
    <div id="inputCBlack" style="background:#000000;"></div>
    <div id="inputCDarkBlue" style="background:#0000AA;"></div>
    <div id="inputCDarkGreen" style="background:#00AA00;"></div>
    <div id="inputCDarkAqua" style="background:#00AAAA;"></div>
    <div id="inputCDarkRed" style="background:#AA0000;"></div>
    <div id="inputCDarkPurple" style="background:#AA00AA;"></div>
    <div id="inputCGold" style="background:#FFAA00;"></div>
    <div id="inputCGray" style="background:#AAAAAA;"></div>
    <div id="inputCDarkGrey" style="background:#555555;"></div>
    <div id="inputCBlue" style="background:#5555FF;"></div>
    <div id="inputCGreen" style="background:#55FF55;"></div>
    <div id="inputCAqua" style="background:#55FFFF;"></div>
    <div id="inputCRed" style="background:#FF5555;"></div>
    <div id="inputCLightPurple" style="background:#FF55FF;"></div>
    <div id="inputCYellow" style="background:#FFFF55;"></div>
    <div id="inputCWhite" style="background:#FFFFFF;"></div>

  </div>
  <div class="IG-formats-container">


        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            Normal
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            <u style="text-decoration:underline">Underline</u>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            <i>Italic</i>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
          <label class="form-check-label" for="gridRadios4">
            <strike style="text-decoration: line-through">Strikethrough</strike>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios5" value="option5">
          <label class="form-check-label" for="gridRadios5">
            <b>Bold</b>
          </label>
        </div>


  </div>
</div>

Pack Title Ingame:<br>

<input type="text" id="IG-input" name="packname-ig" class="form-control" value="<?php echo $packInstanz->getIGName(); ?>">




<br>
Pack Title:<br>
<label id="IG-output"> </label><br>

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
