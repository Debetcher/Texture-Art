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


<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Screens Upload-->

<?php

$pack_id = $_GET['pack'];

$screens = new Screen\ScreenContr;



if (isset($_POST['submitScreens'])) {

  $file_array = reArrayFiles($_FILES['screens']);

  foreach ($file_array as $key => $value) {

    $fileControll[$key] = new fileContr($value);
    $fileControll[$key]->validateFile(["png","jpg"], 1000000);

    if ($fileControll[$key]->error == null) {

      $path = "img/screen/".uniqid();
      $screenContr = new Screen\ScreenContr();
      $screenContr->setScreen($pack_id, $path.".png");
      $fileControll[$key]->uploadFile("", "png", $path);

    }

  }




}





 ?>






<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- Formular Texturepack Picture-->

<form method="post" class="formular1" enctype="multipart/form-data">

Add screenshots <br><br>

<div class="custom-file">
<input type="file" class="custom-file-input" name="screens[]" id="multipleFile1" multiple/>
<label class="custom-file-label multipleFiles1" for="customFile">Choose files</label><br>
</div>


<!-- Ausgabe der ausgewählten screenshots -->
<?php




if (isset($_POST['submitScreens']) && $file_array !== null) {
  echo "<br><br>";
  foreach ($file_array as $key => $value) {

    echo "<br>";

    $fileControll[$key]->displayError();

  }
}


//ändert die struktur der upgeloadeten files
function reArrayFiles($file_post)
     {
         $file_ary = array();
         $file_count = count($file_post['name']);
         $file_keys = array_keys($file_post);
         for ($i = 0; $i < $file_count; $i++) {
             foreach ($file_keys as $key) {
                 $file_ary[$i][$key] = $file_post[$key][$i];
             }
         }
         return $file_ary;
     }
 ?>



<!-- Preview -->

<br><br>


<input type="submit" name="submitScreens" value="Upload" class="btn btn-primary"> <br>

</form>





<br><br><br><br>
<?php


// Display uploadet Screens
################################################################################
################################################################################

foreach ($screens->getScreensbyPackID($pack_id) as $key => $value) {
?>

  <form method="post" class="formular1" enctype="multipart/form-data">

    <img class="screen-preview" src="<?php echo $value['path'] ?>" alt="">
    <br><br><br>
    Screen Title <br>
    <input type="text" name="packname-ig" class="form-control" value="<?php echo $value['title'] ?>"> <br>

    Screen Description <br>
    <input type="text" name="packname-ig" class="form-control" value="<?php echo $value['description'] ?>"> <br>


  <!-- Fehlermeldung -->


  <!-- Preview -->



  <input type="submit" name="submitTPPicture" value="Update" class="btn btn-primary"> <br>

  </form>
  <br>


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


</html>
<?php include "includes/js-imports.inc.php" ?>
