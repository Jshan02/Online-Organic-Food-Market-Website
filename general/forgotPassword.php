<?php
    include "../condb.php";

    session_start();

    if (isset($_POST["submit"])){
        $email = $_POST["forgotPassword"];

        // Check the email registered or not
        $sql = "SELECT * FROM customer WHERE Email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // if yes
        if (mysqli_num_rows($result) == 1){
            echo "<script>
            alert('Confirmation email is sent to your registered email address. Please reset your password using the confirmation email.')
            location = 'LogIn.php'
            </script>";
        } else{
            // if no
            echo "<script>
            alert('Email entered is not registered yet. Please proceed to Sign Up page.')
            location = 'signUp.php'
            </script>";
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
    <link rel="stylesheet" href="forgotPassword.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Forgot Password</title>
</head>

<body>
    <div class="fPassword">
        <div class="left">
            <image class="gif" src="forgotPassword.gif"/>
        </div>

        <div class="right">
            <image class="logo" src="../product/photo/logoBlack.png"/>
            <h3>Forgot your password?<br/>Nevermind, just reset it with a few steps!</h3>
            <div class="forgotForm">
                <form action="" method="POST">
                    <label for="forgot">Please Enter Your Registered Email Address</label><br/>
                    <input type="email" name="forgotPassword" placeholder="abc@gmail.com" value="" required>
                    <br/>
                    <button type="submit" name="submit" class="btn btn-success">Confirm</button></a>
                    <div class="back"><a href="LogIn.php"><i class="fas fa-angle-left"></i>&nbsp;Back to Log In</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>