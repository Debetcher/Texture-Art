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
        123.456
      </div>


    </div>
    <div class="ui-center-div">
      <div class="ui-center-little">
        Ranking
      </div>
      <div class="ui-center-big">
        4#
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

<div class="usermenu-nav-bar">

  <ul>

    <li id="tp-load">Texturepacks</li>
    <li id="post-load">Posts</li>
    <li>Social Media</li>
    <li>Contact Me</li>
  </ul>

</div>


<!-- ################################################################################ -->
<!-- Posts Container -->
<!-- ################################################################################ -->
<div class="profile-posts-container">

<?php

$postG = new Post\PostGlobal;

foreach ($postG->getPosts("Debe123") as $key => $value) {
  ?>

  <div class="post-container">

  <div class="post-left">
    <div class="post-left-title">
      <?php echo $value['title']; ?>

    </div>
    <div class="post-left-text">
      <?php echo $value['text']; ?>
    </div>
    <div class="post-left-replie">
      <i class="fas fa-comments icons"></i>
      <textarea name="name" class="replie-input" rows="8" cols="80" placeholder="write comment..."></textarea>
      <i class="fas fa-share icons" ></i>
    </div>

  </div>
  <div class="post-right">
    <div class="date">
      <?php
      $phpdate = strtotime($value['date']);
      $date = date( 'Y-m-d H:i:s', $phpdate );
      echo $date;


      ?>
    </div>
    <div class="author">
      <?php echo $value['username']; ?>
    </div>

  </div>






  </div>

  <?php
}






 ?>

</div>

<!-- ################################################################################ -->
<!-- Packs Container -->
<!-- ################################################################################ -->

<div class="profile-packs-container">
  hallo hier kommen packs hin
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
