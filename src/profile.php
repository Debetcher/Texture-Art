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
$userC = new User\UserContr;
if (!$userC->isUsernameAvaiable($_GET['un'])) {

  $user = new User\Creator($_GET['un']);
}else {
  header("Location:index.php");
}

 ?>


<div class="banner">
<img src="<?php echo $user->getBanner(); ?>">
</div>

<div class="user-info">

  <div class="ui-left">

    <div class="ui-left-pp">
      <img class="ui-left-pp-li" src="<?php echo $user->getProfilePicture(); ?>">

    </div>
    <div class="ui-left-un_desc">
      <div class="ui-left-un">
        <?php echo $user->getUserName(); ?>
      </div>
      <div class="ui-left-desc">
        <?php echo $user->getDesc(); ?>
      </div>


    </div>


  </div>

  <div class="ui-center">

    <div class="ui-center-div">

      <div class="ui-center-little">
        Downloads:
      </div>
      <div class="ui-center-big">
        <?php echo $user->getDownloads() ?>
      </div>


    </div>
    <div class="ui-center-div">
      <div class="ui-center-little">
        Role:
      </div>
      <div class="ui-center-big">
        <?php echo $userV->getRoles(); ?>
      </div>

    </div>


  </div>

  <div class="ui-right">

  <div class="ui-right-btn">
    <button type="button" name="button" class="btn btn-primary btn-subscribe">Subscribe</button>

  </div>
  <div class="ui-right-abbo">
    123.456 Subscriber
  </div>



  </div>





</div>

<div class="packs-container">


<?php
$packs = new Pack\PackContr;


foreach ($packs->getPacksByUser($user->getID()) as $key => $value) {
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






<br>


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
