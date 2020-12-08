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

<!-- Kontrolliert ob der URL eine ID beigelegt wurde -->
<?php

$pack_id = $_GET['pack'];
$packInstanz = new Pack\PackInstanz($pack_id);

$screenContr = new Screen\ScreenContr;




 ?>

<div class="pack-info">

  	<div class="pack-info-left">

      <div class="pack-info-left-left">
        <img src="<?php echo $packInstanz->getPackPicture(); ?>" alt="">
      </div>
      <div class="pack-info-left-right">
        <div class="pack-info-left-right-title">
          <?php echo $packInstanz->getName(); ?>
        </div>
        <div class="pack-info-left-right-Creator">
          Creator:
          <br>
          <?php
          foreach ($packInstanz->getCreator() as $key => $value) {
            ?>
            <a href="profile.php?un=<?php echo $value['username']; ?>">
              <img src="<?php echo $value["profile_picture"]; ?>" alt="">
              <p><?php echo $value["username"]; ?></p>
              <br>
            </a>
            <?php
          }

           ?>
        </div>
      </div>

    </div>




    <div class="pack-info-center">

      <div>
        Pack Type:<br>
        <span><?php echo $packInstanz->getType(); ?></span>

      </div>

      <div>
        Pack Version:<br>
        <span><?php echo $packInstanz->getVersion(); ?></span>

      </div>





    </div>
    <div class="pack-info-right">



      <div class="dl">
        <button type="button" name="download" class="btn btn-primary">Download</button>
        <p><?php echo $packInstanz->getDownloads() ?> Download</p>
      </div>


    </div>




</div>

<div class="pack-description">
  <h1>Description</h1>
  <?php echo $packInstanz->getDesc(); ?>

</div>






 <!-- ############################################### -->
 <!-- ############################################### -->
 <!-- Start Carousell -->

<div class="out-box">
 <div id="carouselExampleCaptions" class="carousel slide carousel-main" data-ride="carousel">
   <ol class="carousel-indicators">
      <?php
      foreach ($screenContr->getScreensbyPackID($pack_id) as $key => $value) {

        if ($key == 0) {
          echo "<li data-target='#carouselExampleCaptions' data-slide-to='0' class='active'></li>";
        }else {
          echo "<li data-target='#carouselExampleCaptions' data-slide-to='".$key."'></li>";
        }
      }
       ?>
   </ol>
   <div class="carousel-inner">


    <?php
    	 foreach ($screenContr->getScreensbyPackID($pack_id) as $key => $value) {

         	if ($key == 0) {
             ?>
             <div class="carousel-item active">
               <img src="<?php echo $value['path']; ?>" class="d-block w-100 cmimg" alt="...">
               <div class="carousel-caption d-none d-md-block">
                 <h5><?php echo $value['title']; ?></h5>
                 <p><?php echo $value['description']; ?></p>
               </div>
             </div>
             <?php
           }else {
             ?>
             <div class="carousel-item">
               <img src="<?php echo $value['path']; ?>" class="d-block w-100 cmimg" alt="...">
               <div class="carousel-caption d-none d-md-block">
                 <h5><?php echo $value['title']; ?></h5>
                 <p><?php echo $value['description']; ?></p>
               </div>
             </div>

             <?php
           }
       }
     ?>
   <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>
 </div>
 </div>
  <!-- Ens Carousell -->
 <!-- ############################################### -->
 <!-- ############################################### -->





<!-- End Content -->
<!-- ############################################### -->
<!-- ############################################### -->

<br>
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
