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




<div class="packs-container">


<?php
$packs = new Pack\PackContr;


foreach ($packs->getPacks() as $key => $value) {
  ?>
  <a style="text-decoration:none" href="pack.php?pack=<?php echo $value['id'] ?> ">
  <div class="pack-container">

    <div class="pack-image">
      <img src=<?php echo $value["pack_picture"]; ?> >
    </div>
    <div class="pack-title">
      <?php echo $value['name']; ?>
    </div>
    <div class="pack-data">

      <div class="pack-creators">
        <?php

        foreach ($packs->getCreatorsByID($value['id']) as $keyCreate => $valueCreate) {
          echo "<p>" . $valueCreate['username'] . "</p>";
        }

         ?>

      </div>
      <div class="pack-dl">
        <button type="button" class="btn btn-primary" name="button">Download</button>
        <p><?php echo $value['downloads']; ?> Downloads</p>
      </div>

    </div>

  </div>

  <?php
}
 ?>
</a>



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
