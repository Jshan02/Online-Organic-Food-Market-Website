<?php
include "../condb.php";
session_start();

if(!isset($_SESSION["user"])){
    header("Location: ../general/LogIn.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organic-X</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

  <style>
  body{
    font-family: 'Magra', sans-serif;
    background-color: #CDF2CA;
  }
  #title{
    background-color: #CDF2CA;
    color: #fff;
  
  }
  h1{
    font-family: 'Magra', sans-serif;
    font-size: 3.1rem;
  }
  h2 {
    font-family: 'Magra', sans-serif;
    font-size: 2.5rem;
    line-height: 1.5;
  }
  h3{
    font-family: 'Magra', sans-serif;
    color: #000000;
    font-size: 1.5rem;
    line-height: 1.5;
  }
  h4{
    font-family: 'Magra', sans-serif;
    color: #000000;
    font-size: 0.5rem;
    line-height: 1.5;
  }
  h5 {
    font-family: 'Magra', sans-serif;
    font-size: 1.5rem;
    line-height: 1.5;
    color: #fff;
  }
  p{
    color: #000000;
    font-family: 'Magra', sans-serif;
  }
  .container-fluid{
    padding: 3% 15%;
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="adminhome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addItem.php">Add Item</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="toShip.php">View Order</a>
      </li>
    </ul>
    </div>
    <a class="navbar-brand" href="adminhome.php">
      <img src="../product/photo/logo.png" alt="Organic" width="125">
    </a>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-md-2" type="search" placeholder="Interested in Anything?">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
    <nav class="navbar navbar-expand-xl">
      <ul class="navbar-nav">
      <li class="nav-item">
          &nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="toShip.php" role="button"><i class="fas fa-cart-plus"></i>&nbsp; View Order</a>
        </li>
        <li class="nav-item">
        &nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="../general/logOut.php" role="button"><i class="fas fa-sign-out-alt"></i>&nbsp; Log Out</a>
        </li>
      </ul>
    </nav>
  </nav>
 