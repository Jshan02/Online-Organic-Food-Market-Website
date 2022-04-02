<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organic-X</title>
  <!-- CSS Style -->
  <!-- <link rel="stylesheet" href="home.css"> -->
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
    /* line-height: 1.5; */
    /* font-weight: 900; */
    /* padding-top: 18%; */
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
  
  /* Navigation Bar */
  .navbar{
    padding-bottom: 1.25rem;
  }
  .navbar-brand{
    /* font-family: 'Ubuntu', sans-serif; */
    font-size: 2.5rem;
    font-weight: bold;
  }
  .nav-item{
    padding: 0 18px;
  } */
  .navbar-nav{
    margin-left: auto;
  }
  


  

  
  /* Testimonials */
  #testimonials{
    background-color: #CDF2CA;
    text-align: center;
  
    color: #fff;
  }

  .carousel-item {
    padding: 7% 15%;
  }


  .container {
    max-width: 960px;
  }


/* What's New */
.align {
  text-align: center;
  align-items: center;
}


/* What We Have */
#whatwehave {
  background-color: #CDF2CA;
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
        <a class="nav-link" href="../product/home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../aboutUs/aboutUs.php">Our Story</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../product/whatsnew.php">What's New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../product/whatshot.php">What's Hot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../product/whatwehave.php?Category=Rice">What We Have</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../faq/faq.php">FAQs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contactUs/contactUs.php">Contact Us</a>
      </li>
    </ul>
    </div>
    <a class="navbar-brand" href="home.php">
      <img src="..//product/photo/logo.png" alt="Organic" width="125">
    </a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Interested in Anything?">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <nav class="navbar navbar-expand-xl">
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>&nbsp; My Account
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../profile/profile.php">My Profile</a>
              <a class="dropdown-item" href="#">My Addresses</a>
              <a class="dropdown-item" href="../viewOrder/toShip.php">My Orders</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Log Out</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          &nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="../shoppingCart/cart.php" role="button"><i class="fas fa-cart-plus"></i>&nbsp; Cart</a>
        </li>
      </ul>
    </nav>
  </nav>
  