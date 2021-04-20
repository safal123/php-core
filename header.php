<?php session_start() ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Safal Shop</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
      </ul>
    </div>
    <div class="ml-auto">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <?php
        if (isset($_SESSION['email'])) {
          echo '<li class="nav-item active">
          <a class="nav-link" href="includes/logout.php">Logout</a>
        </li>';
          echo '<li class="nav-item active">
          <a class="nav-link" href="#">Profile</a>
        </li>';
        } else {
          echo '<li class="nav-item active">
          <a class="nav-link" href="register.php">Register</a>
        </li>';
          echo '<li class="nav-item active">
          <a class="nav-link" href="login.php">Login</a>
        </li>';
        }
        ?>
      </ul>
    </div>
  </nav>