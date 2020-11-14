<?php
session_start();
spl_autoload_register('autoLoader');

function autoLoader($className){
$path = "classes/";
$extension = ".class.php";

$split = explode("\\", $className);

if (sizeof($split) > 1) {

  $namespace = $split[0];
  $class = strtolower($split[1]);

  $className = $namespace . "/" . $class;
  $fullPath = $path . $className . $extension;
}else {
  $fullPath = $path . strtolower($className) . $extension;
}


if (!file_exists($fullPath)) {
  return false;
}
include_once $fullPath;
}
?>
