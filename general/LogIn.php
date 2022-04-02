<?php
  include "../condb.php";

  session_start();

  // If user clicks submit button
  if (isset($_POST["submit"])) {
    // Get the data entered
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    // Read the data stored in both customer and admin table
    $sql1 = "SELECT * FROM adminacc WHERE AdEmail = '$email' AND AdPassword = '$password' LIMIT 1";
    $sql2 = "SELECT * FROM customer WHERE Email = '$email' AND CustPassword = '$password'LIMIT 1";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    // If data entered is stored in admin database
    if(mysqli_num_rows($result1)==1){
      // Log in as admin
      $details = mysqli_fetch_assoc($result1);
      $_SESSION["user"] = $details["AdEmail"];
      header("Location:../admin/adminhome.php");
    }
    // If data entered is stored in customer database
    elseif(mysqli_num_rows($result2)==1){
      // Log in as customer
      $details = mysqli_fetch_assoc($result2);
      $_SESSION["user"] = $details["CustUsername"];
      header("Location: ../product/home.php");;
    }
    // If data entered not found in both admin and customer database
    else{
      echo '<script>alert("Wrong email or password entered! Please try again.")</script>';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="LogIn.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Log In</title>
</head>

<body>

  <div class="logIn">
    <div class="left">
      <h1>New Here?</h1>
      <a href="signUp.php"><button type="button" class="btn btn-outline-success">Join Us Now</button></a>
    
      <h4>Why should you trust us?</h4>
      <div class="reason">
        <i class="far fa-check-circle">100% Organice</i></br>
        <i class="far fa-check-circle">Lowest Price Guarantee</i></br>
        <i class="far fa-check-circle">Free Delivery to Home Service</i>
      </div>
    </div>

    <div class="right">
      <img class="logo" src="../product/photo/logoBlack.png"/>
      <h3>Welcome Back, Our Dearest Customer!</h3>

      <div class="loginForm">
        <!-- Log in form -->
        <form action="" method="POST">
          <label for="email">Email</label><br/>
            <input type="email" placeholder="abc@gmail.com" name="Email" id="email" required>
          <br/><br/>
          <label for="password">Password</label><br/>
            <input type="password" placeholder="Password" name="Password" required>

          <!-- Forgot password link -->
          <div class="forgotPassword"><a href="forgotPassword.php">Forgot your password?</a></div>
      
          <div class="loginbtn">
            <!-- Submit button -->
            <button type="submit" class="btn btn-success" name="submit">Log In</button></a>
          </div>

          <div class="terms">By signing in, I agree to Organic-X Terms and Conditions and Privacy Policy.</div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>