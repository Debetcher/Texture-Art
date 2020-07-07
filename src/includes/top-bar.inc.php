
<div class="container-top_bar">



<div class="left-top_bar">

  <ul>
    <li><a href="#"><i class="fas fa-bars icons" id="side-bar-btn"></i></a></li>
    <li><div class="div-logo"></div></li>
  </ul>

</div>



<div class="center-top_bar">

  <ul>
    <li class="div-search-input"><input type="text" name="search-input" placeholder="Searching..."></li>
    <li><a href="#"><i class="fas fa-search icons20"></i></a></li>


  </ul>

</div>





<div class="right-top_bar">

  <ul>
<?php
if (isset($_SESSION['username'])) {
  $tempUser = new User\UserView($_SESSION['username']);

  if ($tempUser->getProfilePicture =! null) {
    echo "<li><img id='profile-bar-btn' src='img/profile-pictures/2.png'></li>";
  }else {
    echo "<li><a href='#'><i id='profile-bar-btn' class='fas fa-user-circle icons'></i></a></li>";
  }

}else {

  echo "<li><a href='#'><i id='profile-bar-btn' class='fas fa-user-circle icons'></i></a></li>";

}

 ?>

<li><a href="#"><i class="fas fa-cog icons"></i></a></li>


</ul>

</div>

















<!-- topbar-profile-bar -->

<div class="topbar-profile-bar">

  <ul>



    <?php

    if (isset($_SESSION["username"])) {
      ?>
      <img src="img/profile-pictures/2.png">

      <div class="line"></div>


      <!-- Wenn der Benutzer angemeldet ist -->
      <a href="profile.php?un=Debe123"><li class="item"><i class="fas fa-user-circle"></i> &nbsp; Profile</li></a>
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













</div>
