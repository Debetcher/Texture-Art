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

<!-- Wird nach dem Abschicken des Formulares ausgeführt -->

<?php


if (isset($_POST['submit'])) {

//die Eingabe wird validiert.
$validation = new FormValidator($_POST);
$errors = $validation->validateForm();


//Falls die Validierung erfolgreich war, wird überprüft ob die Anmelde Date korrekt sind.

if ($errors == null) {

    $userC = new User\UserContr();
    if ($userC->userLogin($_POST['username'],$_POST['password'])) {
      echo "logged in";

      $userV = new User\UserView($_POST['username']);

      $rmC = new RememberMe\rmContr;
      $rmC->createRM( $userV->getID());
      $_SESSION["username"] = $_POST['username'];

    }else {
      echo "Username or Password are wrong";
    }

  }




}

 ?>

<!-- Beginn des Formulares -->
<div class="formular1">
  <form method="post">

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control">
    </div>

      <?php echo $errors['username'] ?? '' ?>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>

    <?php echo $errors['password'] ?? '' ?>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input">
      <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

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
<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Popper CDN -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!-- Main JS -->
<script src="./js/main.min.js"></script>

</html>
