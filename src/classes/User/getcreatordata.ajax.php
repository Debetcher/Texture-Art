<?php
include "../database.class.php";
include "user.class.php";
include "usercontr.class.php";

$userC = new User\UserContr;

$chars = $_POST['inputValue'];

if ($chars != "") {
  foreach ($userC->searchUsers($chars) as $key => $value) {

    ?>
    <div class="creator-list">

      <div class="cl-left">

        <div class="cll-picture">
          <img src="<?php echo $value['profile_picture']; ?>" alt="Profile Picture">
        </div>
        <div class="cll-name">
          <?php echo $value["username"]; ?>
        </div>


      </div>

      <div class="cl-center">



      </div>

      <div class="cl-right">

        <button type="button" class="btn-primary btn" name="button">Subscribe</button>

      </div>

    </div>


    <?php

  }
}
