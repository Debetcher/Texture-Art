
<?php

include "../database.class.php";
include "packinvite.class.php";
include "packinvitecontr.class.php";

$piC = new PackInvite\PackInviteContr;

$value = $_POST["inputValue"];
$elem = $_POST["inputPI"];
$user = $_POST["inputUser"];


if ($value == true) {
  $piC->acceptPI($elem);

}else{
  $piC->rejectPI($elem);

}


foreach ($piC->getPIBYUsername($user) as $key => $value) {
?>
<div class="invite-request" style="background:#181A1C;">
  <div class="request-letter">
    <b><?php echo $value["username"]; ?></b> invited you to work on the pack <b><?php echo $value["name"]; ?></b>
  </div>
  <div class="request-accept" >
    <i class="fas fa-check-circle"  style="color:#71E27F;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $user ?>"></i>
  </div>
  <div class="request-reject" >
    <i class="fas fa-times-circle" style="color:#FF6949;" data-id="<?php echo $value["id"]; ?>" data-username="<?php echo $user ?>"></i>
  </div>

</div>


<?php
}

 ?>
