
<?php
session_start();
session_destroy();

setcookie("RMtoken", $hashToken, time() - 60, "/");
setcookie("RMID", $userID, time() - 60, "/");

header('Location: index.php');

?>
