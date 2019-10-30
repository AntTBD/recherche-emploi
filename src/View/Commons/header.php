<?php

require __DIR__.'/../../../vendor/autoload.php';

//demarrer les sessions
session_start();

use App\Model\Repository\Repository;
$base = Repository::connect();

?>

<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="utf-8" />

  <!-- css bootstrap -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" > -->
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- pour trouver des icons go to : https://fontawesome.com/icons -->

  <!-- style perso css -->
  <link rel="stylesheet" href="/css/style.css">

  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="/js/jquery-3.3.1.slim.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="/js/popper.min.js"></script>

  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <script src="/js/bootstrap.min.js"></script>




  <title>Recherche Emploi</title>
</head>
<body id="myBody">

  <?php
  require __DIR__.'/navbar.php';
  ?>

  <!-- Begin page content -->
  <div class="container body-container">
    <div class="row">
      <div id="main" class="col">
