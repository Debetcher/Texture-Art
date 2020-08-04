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

<!-- ################################################### -->
<!-- PHP -->

<?php






if(isset($_POST['submit'])) {

$validation_step = 0;
//die Eingabe wird validiert.


$validation = new FormValidator($_POST);
$errors = $validation->validateForm();

if ($_FILES['tp-file']['error'] == 0) {

  $pack_val = new fileContr($_FILES['tp-file']);

  $pack_val->validateFile(["png"], 1000000);





}

if ($_FILES['tp-picture']['error'] == 0) {

  $pack_picture_val = new fileContr($_FILES['tp-picture']);

  $pack_picture_val->validateFile(["png"], 1000000);


}


if ($errors == null && $pack_val->error == null && $pack_picture_val->error == null) {

  //Pack wird in die Datenbank gespeichert

  $packC = new Pack\PackContr;
  $packC->setPack($_POST['packname'], $_POST['packname-ig'], $_POST['description'], "no path", "no path", $_POST['status'], $_POST['categorie'], $_POST['type'], $_POST['version']);

  $pack_id = $packC->getIDByName($_POST['packname'])[0]['id'];

  $pack_val->uploadFile($pack_id, "zip", "packs/");
  $pack_picture_val->uploadFile($pack_id, "png", "img/pack-picture/");


  $packInstanz = new Pack\PackInstanz($pack_id);

  $packInstanz->updatePath("packs/" . $pack_id . ".zip");
  $packInstanz->updatePackPicture("img/pack-picture/" . $pack_id . ".png");

  //Der aktuelle Benutzer wird als Creator eingetragen
  $userInstanz = new User\UserView($_SESSION['username']);


  $packInstanz->setPackCreator($userInstanz->getID());

  header("Location:pack.php?pack=" . $pack_id);






}





}




 ?>



<!-- ################################################### -->
<!-- HTML -->
<form class="formular1" method="post" action="create-pack.php" enctype="multipart/form-data">

<!-- Pack Name -->

  <div class="form-group">
    <label>Name</label>
    <input type="text" name="packname" class="form-control">
  </div>

  <?php
  if (isset($errors['packname'])) {
    $validation->displayError($errors['packname']);
  }
   ?>

 <!-- Pack Ingame Name -->

   <div class="form-group">
     <label>IngameName</label>
     <input type="text" name="packname-ig" class="form-control">
   </div>

   <?php
   if (isset($errors['packname-ig'])) {
     $validation->displayError($errors['packname-ig']);
   }
    ?>

 <!-- Description -->

  <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>

  <?php
  if (isset($errors['description'])) {
    $validation->displayError($errors['description']);
  }
   ?>

   <!-- TP upload -->

  <div class="form-group" >
    <label>Texturepack</label>

    <div class="custom-file">
  <input type="file" class="custom-file-input" name="tp-file" id="inputFile">
  <label class="custom-file-label file_label_1" for="customFile">Choose file</label>
</div>
  </div>

  <?php
  if (isset($pack_val)) {
    $pack_val->displayError();
  }else if(isset($_POST["submit"])){
    ?>
    <div class="alert alert-danger" role="alert">
    <?php echo "No file choosen!" ?>
    </div>
    <?php
  }

  if (isset($upload)) {
    $upload->displayError("pack");
  }

   ?>


   <div class="form-group" >
     <label>Texturepack Picture</label>

     <div class="custom-file">
   <input type="file" class="custom-file-input" name="tp-picture" id="inputFile2">
   <label class="custom-file-label file_label_2" for="customFile">Choose file</label>
 </div>


   </div>
   <?php
   if (isset($pack_picture_val)) {
     $pack_picture_val->displayError();
   }else if(isset($_POST["submit"])){
     ?>
     <div class="alert alert-danger" role="alert">
     <?php echo "No picture choosen!" ?>
     </div>
     <?php
   }



   if (isset($upload)) {
     $upload->displayError("pack");
   }

    ?>



  <div class="form-group form-drop-down">
    <label>Status</label>
    <select class="form-control" name="status">

      <?php
      $status = new Status\StatusContr;
      $status->getAllStatus();
      foreach ($status->getAllStatus() as $key => $value) {
        echo "<option style='color:black;'>".$value['name']."</option>";
      }
       ?>


    </select>
  </div>

  <div class="form-group form-drop-down">
    <label>Categorie</label>
    <select class="form-control" name="categorie">
      <?php
      $categorie = new PackCategorie\CategorieContr;
      $categorie->getAllCategories();
      foreach ($categorie->getAllCategories() as $key => $value) {
        echo "<option style='color:black;'>".$value['name']."</option>";
      }
       ?>
    </select>
  </div>

  <div class="form-group form-drop-down">
    <label>Version</label>
    <select class="form-control" name="version">

      <?php
      $version = new PackVersion\VersionContr;
      $version->getAllVersions();
      foreach ($version->getAllVersions() as $key => $value) {
        echo "<option style='color:black;'>".$value['name']."</option>";
      }
       ?>



    </select>
  </div>

  <div class="form-group form-drop-down">
    <label>Type</label>
    <select class="form-control" name="type">
      <?php
      $type = new PackType\TypeContr;
      $type->getAllTypes();
      foreach ($type->getAllTypes() as $key => $value) {
        echo "<option style='color:black;'>".$value['name']."</option>";
      }
       ?>
    </select>
  </div>


  <button type="submit" name="submit" id="submitForm" class="btn btn-primary">Submit</button>

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
<?php include "includes/js-imports.inc.php" ?>

</html>
