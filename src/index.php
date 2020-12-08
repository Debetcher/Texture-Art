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



<div class="packs-container">


<?php
$packs = new Pack\PackContr;


foreach ($packs->getPacksByDate() as $key => $value) {
  ?>



  <article class="pack-container">
    <div class="pack-img">
      <img src="<?php echo $value["pack_picture"]; ?>" alt="Cannot display image!">
    </div>
    <div class="pack-name">
      <?php echo $value['name']; ?>
    </div>
    <div class="pack-creators">
      <?php

      foreach ($packs->getCreatorsByID($value['id']) as $keyCreate => $valueCreate) {
        ?>
          <a href="profile.php?un=<?php echo $valueCreate['username']; ?>">
            <img src="<?php echo $valueCreate["profile_picture"]; ?>" alt="">
            <p><?php echo $valueCreate["username"]; ?></p>
            <br>
          </a>


        <?php

      }

       ?>
    </div>
    <div class="pack-actions">

      <a href="pack.php?pack=<?php echo $value['id'] ?>"> <button type="button" class="btn btn-primary" name="see_more">See more</button> </a>
      <a href="includes/download.inc.php?file_path=<?php echo $value['path'] ?>">
        <button type="button" class="btn btn-primary" name="download">Download</button>
        <p><?php echo $value['downloads'] . " Downloads" ?></p>
      </a>


    </div>

  </article>


<?php
}

 ?>










</div>




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
