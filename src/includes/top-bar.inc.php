
<div class="container-top_bar">


<!-- Initialisieren von Variablen -->
<?php

$piC = new PackInvite\PackInviteContr;

$userC = new User\UserContr;

if (isset($_SESSION["username"])) {
  $userV = new User\UserView($_SESSION['username']);


}



 ?>




<div class="left-top_bar">

  <ul>
    <li><a href="#"><i class="fas fa-bars" id="side-bar-btn"></i></a></li>
    <li><div class="div-logo"><img src="img/logo_name.png" onClick="window.location = 'index.php'"></div></li>
  </ul>

</div>





<div class="center-top_bar" id="center-top_bar">


  <input id="search-input" type="text" name="search-input" placeholder="Searching...">




</div>







<div class="right-top_bar">

  <ul class="navbar-nav mr-auto">



      <?php
      if ($userC->isUserAuthorized("creator")) {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./create-pack.php"><i class="fas fa-plus"></i></a>
        </li>
        <?php
      }
       ?>

       <?php
       if ($userC->isUserAuthorized("creator")) {
         ?>
         <li class="nav-item">
           <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user-friends"></i>
           </a>

           <div class="dropdown-menu dropdown-menu-right pi-dropdown" aria-labelledby="navbarDropdown">
             <?php
                foreach ($piC->getPIBYUsername($_SESSION['username']) as $key => $value) {
                  ?>
                    <div class="dropdown-item">

                        <a><?php echo $value['name']; ?></a>


                        <i class="fas fa-check-circle"  style="color:#71E27F;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $_SESSION["username"]; ?>"></i>


                        <i class="fas fa-times-circle" style="color:#FF6949;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $_SESSION["username"]; ?>"></i>

                    </div>
                  <?php
                }
              ?>

           </div>


           <?php
           foreach ($piC->getPIBYUsername($_SESSION['username']) as $key => $value) {
           ?>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background:#181A1C;">
             <div class="request-letter">
               <b><?php echo $value["requested"]; ?></b> invited you to work on the pack <b><?php echo $value["name"]; ?></b>
             </div>
             <div class="request-accept">
               <i class="fas fa-check-circle"  style="color:#71E27F;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $_SESSION["username"]; ?>"></i>
             </div>
             <div>
               <i class="fas fa-times-circle request-reject" style="color:#FF6949;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $_SESSION["username"]; ?>"></i>
             </div>

           </div>


           <?php
           }
           ?>
         </li>
         <?php
       }
        ?>

        <?php
        if ($userC->isUserAuthorized("creator")) {
          ?>


          <li class="nav-item">
            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="#">nachricht1</a>
              <a class="dropdown-item" href="#">nachricht2</a>

            </div>
          </li>
          <?php
        }
         ?>



         <?php
         if (!isset($_SESSION['username'])) {
           ?>
           <li class="nav-item">
             <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user"></i>
             </a>

             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

               <a class="dropdown-item" href="./login.php">Login</a>
               <a class="dropdown-item" href="./register.php">Register</a>
             </div>
           </li>
           <?php
         }
          ?>



          <?php
          if (isset($_SESSION['username'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $userV->getProfilePicture(); ?>" alt="">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="picture"><img src="<?php echo $userV->getProfilePicture(); ?>"></a>
                <a class="dropdown-item" href="#"><?php echo $userV->getUserName(); ?></a>
                <a class="dropdown-item" href="#"><?php echo $userV->getRoles(); ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile.php?un=<?php echo $userV->getUserName(); ?>">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="./logout.php">Logout</a>
              </div>
            </li>
            <?php
          }
           ?>


           <?php
           if (isset($_SESSION['username'])) {
             ?>
             <li class="nav-item">
               <a class="nav-link" href="./user-settings.php"><i class="fas fa-cog"></i></a>
             </li>

             <?php
           }
            ?>










    </ul>

</div>
















<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- topbar-profile-bar -->

<div class="topbar-profile-bar bars-array-div" id="topbar-profile-bar">

  <ul>

    <?php

    if (isset($_SESSION["username"])) {
      ?>
      <img src="img/profile-pictures/2.png">

      <div class="line"></div>


      <!-- Wenn der Benutzer angemeldet ist -->
      <a href="profile.php?un=<?php echo $_SESSION["username"]; ?>"><li class="item"><i class="fas fa-user-circle"></i> &nbsp; Profile</li></a>
      <a href="#"><li class="item"><i class="fas fa-folder-open"></i> &nbsp; Packs</li></a>
      <a href="user-settings.php"><li class="item"><i class="fas fa-user-cog"></i> &nbsp; Settings</li></a>
      <a href="logout.php"><li class="item"><i class="fas fa-sign-out-alt"></i> &nbsp; Logout</li></a>

      <?php
    }else {

      ?>

      <!-- Wenn kein Benutzer angemeldet ist -->
      <a href="login.php"><li class="item"><i class="fas fa-user-circle"></i> &nbsp; Login</li></a>
      <a href="register.php"><li class="item"><i class="fas fa-user-circle"></i> &nbsp; Register</li></a>

      <?php
    }
     ?>
  </ul>

</div>


<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- notification-bar -->

<div class="topbar-notification-bar topbar-invite-bar bars-array-div" id="topbar-invite-bar">

<?php


if (isset($_SESSION["username"])) {

foreach ($piC->getPIBYUsername($_SESSION['username']) as $key => $value) {
?>
<div class="invite-request" style="background:#181A1C;">
  <div class="request-letter">
    <b><?php echo $value["requested"]; ?></b> invited you to work on the pack <b><?php echo $value["name"]; ?></b>
  </div>
  <div class="request-accept" >
    <i class="fas fa-check-circle"  style="color:#71E27F;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $_SESSION["username"]; ?>"></i>
  </div>
  <div class="request-reject" >
    <i class="fas fa-times-circle" style="color:#FF6949;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $_SESSION["username"]; ?>"></i>
  </div>

</div>


<?php
}
}

 ?>

</div>





<div class="topbar-notification-bar topbar-noti-bar bars-array-div">
notification

</div>




<!-- ################################################################################ -->
<!-- ################################################################################ -->
<!-- searching-bar -->



<div class="searching-bar" id="searching-bar">
  <div class="sb_creator" id="sb_creator">

  </div>

  <div class="sb_pack" id="sb_pack">

  </div>

</div>







</div>
