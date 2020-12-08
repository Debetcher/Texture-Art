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







<form class="formular1" method="post" action="formLogic/create-pack.php" enctype="multipart/form-data">

<!-- Pack Name -->

  <div class="form-group">
    <label for="packname">Name</label>
    <input id="packname" type="text" name="packname" class="form-control" required autofocus>
  </div>


 <!-- Pack Ingame Name -->

   <div class="form-group">
     <label for="packname-ig">IngameName</label>
     <input id="packname-ig" type="text" name="packname-ig" class="form-control" required>
   </div>


 <!-- Description -->

  <div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" class="form-control" required></textarea>
  </div>

   <!-- TP upload -->

  <div class="form-group" >
    <label for="inputFile">Texturepack</label>

    <div class="custom-file">
      <input type="file" class="custom-file-input" name="tp-file" id="inputFile" required>
      <label class="custom-file-label file_label_1" for="customFile">Choose file</label>
    </div>
  </div>


   <div class="form-group" >
     <label for="inputFile2">Texturepack Picture</label>

     <div class="custom-file">
       <input type="file" class="custom-file-input" name="tp-picture" id="inputFile2" required>
       <label class="custom-file-label file_label_2" for="customFile">Choose file</label>
     </div>


   </div>


  <div class="form-group form-drop-down">
    <label for="status">Status</label>
    <select id="status" class="custom-select" name="status">

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
    <label for="categorie">Categorie</label>
    <select id="categorie" class="custom-select" name="categorie">
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
    <label for="version">Version</label>
    <select id="version" class="custom-select" name="version">

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
    <label for="type">Type</label>
    <select id="type" class="custom-select" name="type">
      <?php
      $type = new PackType\TypeContr;
      $type->getAllTypes();
      foreach ($type->getAllTypes() as $key => $value) {
        echo "<option style='color:black;'>".$value['name']."</option>";
      }
       ?>
    </select>
  </div>

  <button type="submit" name="submit" id="submitForm" class="btn btn-primary form-btn">Submit</button>

  <a href="index.php"><div class="btn btn-danger form-btn">Cancel</div></a>



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
