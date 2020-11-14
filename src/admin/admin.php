<!-- Includes  -->
<?php include "../includes/aladmin.inc.php" ?>
<?php include "../includes/aheader.inc.php" ?>

<!-- Grid Layout -->
<div class="grid-layout">

<div class="top-bar">
<?php include "../includes/top-bar.inc.php" ?>
</div>

<div class="content-left">
<!-- freier Bereich, der evtl für Side Bar genutzt wird -->
</div>

<div class="content-main">

<!-- ############################################### -->
<!-- ############################################### -->
<!-- Start Content -->

<?php

$userC = new User\UserContr;



 ?>
 <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Rank</th>
    </tr>
  </thead>
  <tbody>

<?php
foreach ($userC->getAllUsers() as $key => $value) {
?>

<tr>
  <th scope="row"><?php echo $value["id"]; ?></th>
  <td><?php echo $value["username"]; ?></td>
  <td><?php echo $value["email"]; ?></td>
  <td><?php echo $value["name"]; ?></td>
</tr>

<?php
}


 ?>

  </tbody>
</table>






<!-- End Content -->
<!-- ############################################### -->
<!-- ############################################### -->

</div>

<div class="content-right">
<!-- freier Bereich für Werbung etc -->
</div>

<div class="footer">
<?php include "../includes/footer.inc.php" ?>
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
