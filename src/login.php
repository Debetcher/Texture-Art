<?php
  include "includes/autoloader.inc.php";
  include "includes/header.inc.php" ?>

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

<!-- Beginn des Formulares -->
<div class="formular1">
  <form method="post" action="formLogic/login.php" id="loginForm">
<!-- action="formLogic/login.php" -->
    <div class="form-group">
      <label>Username</label>
      <input type="text"  name="username" class="form-control" id="username" data-parsley-username-exist required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" id="password"
              data-parsley-trigger-after-failure="submit"
              data-parsley-login
              required>
    </div>

    <div class="form-group form-check">
      <input type="checkbox" name="rm" class="form-check-input">
      <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    </div>

    <button type="submit" name="submitLogin" class="btn btn-primary btn-form-submit">Submit</button>

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
