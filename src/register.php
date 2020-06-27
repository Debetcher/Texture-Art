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


//Falls die Validierung erfolgreich war, werden die eingegebenen Daten überprüft

if ($errors == null) {
    $userC = new User\UserContr();
    $userV = new User\UserView();

    if (!$userV->isUsernameAvaiable($_POST['username'])) {
      $validation->addError("username", "username is no avaible");
      $errors = $validation->validateForm();

    }else if (!$userV->isEmailAvaiable($_POST['email'])) {
      $validation->addError("email", "email is not avaiable");
      $errors = $validation->validateForm();

    }else{
      //verschlüsseln
      $hashPW = password_hash($_POST["password"], PASSWORD_DEFAULT);


      //Nachdem alle Daten überprüft wurden, wird der Benutzer in die Datenbank eingetragen
      $userC->createUser($_POST["username"],$_POST["email"],$hashPW);
      $SESSION["username"] = $_POST['username'];
    }
  }
}

 ?>


<!-- Begin des Formulares -->
<div class="formular1">
  <form method="post">

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control">
    </div>

      <?php echo $errors['username'] ?? '' ?>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

      <?php echo $errors['email'] ?? '' ?>

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
