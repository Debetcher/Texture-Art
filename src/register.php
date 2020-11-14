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


</div>

<div class="content-main">

<!-- ############################################### -->
<!-- ############################################### -->
<!-- Start Content -->

<?php
$token = 1111;
 ?>

<div class="formular1">
  <form method="post" action="formLogic/register.php" id="registerForm">

    <div class="form-group showfirst">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" id="username"
              data-parsley-username-available
              data-parsley-group="first"
              required>
    </div>

    <div class="form-group showfirst">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email"
              data-parsley-email-available
              data-parsley-group="first"
              required>
    </div>

    <div class="form-group showfirst">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password"
              data-parsley-group="first"
              required>
    </div>

    <div class="form-group showlast" style="display:none">
      <label for="aktivation">Aktivation Code</label>
      <input type="text" name="aktivation" class="form-control" id="aktivation"
              data-parsley-group="second"
              data-parsley-check-activation
              required>
    </div>

    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <div class="form-group form-check showfirst">
      <input type="checkbox" class="form-check-input" name="rememberme" id="rememberme">
      <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    </div>

    <button type="button" name="btn" class="btn btn-primary showfirst" id="btnRegister">Register</button>

    <button type="submit" name="submitRegister" class="btn btn-primary showlast" id="btnAktivate" style="display:none; margin-top:10px">Aktivate</button>

  </form>
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
