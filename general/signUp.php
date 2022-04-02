<?php
  include "../condb.php";

  session_start();

  // If submit button is clicked
  if (isset($_POST["submit"])){
    // Get the data filled in registration form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $phone = $_POST["phone"];

    // Check whether 2 password input is the same
    if ($password == $cpassword){
      // If same, check does the email entered already stored in database
      $sql = "SELECT * FROM customer WHERE Email = '$email' LIMIT 1";
      $result = mysqli_query($conn, $sql);

      // If email entered has not been stored
      if (mysqli_num_rows($result) == 0){
        // Insert the data filled by user
        $sql = "INSERT INTO customer (CustUsername, CustPassword, Email, Phone) 
        VALUES ('$username', '$password', '$email', '$phone')";
        $result = mysqli_query($conn, $sql);

        if ($result){
          // If data successfully inserted
          echo "<script>
          alert('You have successfully registered!')
          location = 'LogIn.php'
          </script>";
        } else{
          // If data fail to insert
          echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
        }

      } else{
        // If email entered has been stored in database
        echo "<script>alert('Email entered is registered. Please proceed to log in.')</script>";
      }

    } else{
      // If 2 password input different
      echo "<script>alert('Password entered not matched. Please try again.')</script>";
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
    <link rel="stylesheet" href="signUp.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Sign Up</title>
</head>

<body>

  <div class="signUp">
    <div class="left">
      <img class="logo" src="../product/photo/logoBlack.png"/>
      <h3>Glad to See You!</h3>
      
      <div class="signupForm">
        <!-- Registration Form -->
        <form action="" method="POST">
          <label for="username">Username</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="phone">Phone Number</label><br/>
            <input type="text" name="username" placeholder="Joanne" required>
            &nbsp;
            <input type="tel" name="phone" placeholder="012-3456789" pattern="[0-9]{3}-[0-9]{7}" required>
            <br/><br/>
          <label for="email">Email</label><br/>
            <input type="email" name="email" placeholder="abc@gmail.com" required style="width: 100%;">
            <br/><br/>
          <label for="password">Password</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="cpassword">Confirm Password</label><br/>
            <input type="password" name="password" placeholder="Password" required>
            &nbsp;
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <br/><br/>

          <div class="signupbtn">
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-success">Sign Up</button></a>
          </div>

          <div class="terms">By signing up, I agree to Organic-X Terms and Conditions and Privacy Policy.</div>
        </form>
      </div>
    </div>

    <div class="right">
      <h1>One of Us?</h1>
      <a href="LogIn.php"><button type="button" class="btn btn-outline-success">Welcome Back!</button></a>
      <h4>Why should you sign in?</h4>
      <div class="reason">
        <i class="far fa-check-circle">Add Items to Cart</i><br/>
        <i class="far fa-check-circle">Check Out Faster</i><br/>
        <i class="far fa-check-circle">Access Order History</i><br/>
      </div>
    </div>
  </div>

</body>
</html>