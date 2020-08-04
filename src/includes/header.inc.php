<?php session_start(); ?>

<!DOCTYPE html>
<html class="fPage" lang="en">

<head>

    <!-- Metadaten -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">

    <!-- Titel -->
    <title>Texture Art</title>

    <!-- SASS Import -->
    <link rel="stylesheet" href="./css/main.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css">
</head>

<body>

  <!-- Wenn Benutzer angemeldet ist, wird er initialisiert. -->

<?php

$rmC = new RememberMe\rmContr;


//checkt ob cookies gesetzt wurden und der Benutzer automatisch angemeldet werden kann.
//Wenn dies zutrifft wird die Session gestartet
//Der Benutzer wird initialisiert
if (isset($_SESSION['username'])) {

$userInstanz = new User\UserView($_SESSION['username']);

}







 ?>
