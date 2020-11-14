<?php
include "../database.class.php";
include "pack.class.php";
include "packcontr.class.php";

$packC = new Pack\PackContr;

$chars = $_POST['inputValue'];


if ($chars != "") {

  foreach ($packC->searchPacks($chars) as $key => $value) {

    ?>
    <div class="creator-list">

      <div class="cl-left">

        <div class="cll-picture">
          <img src="<?php echo $value['pack_picture']; ?>" alt="Profile Picture">
        </div>
        <div class="cll-name">
          <?php echo $value["name"]; ?>
        </div>


      </div>

      <div class="cl-center">



      </div>

      <div class="cl-right">

        <button type="button" class="btn-primary btn" name="button">Download</button>

      </div>

    </div>


    <?php

  }
}
