<?php

if(isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $feedback = $_POST['feedback'];
}

$subject = "Feeback from" .$name;

$mailheader = "From:".$name; // \r\n is the line break

$recipient = "";

mail($recipient, $subject, $feedback, $mailheader) or die("Error!");

echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="mail.css">
    
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="text"><center>Thank you for giving us your feedback.</center></h2>
                <h3 class="text"><center>We will continue to improve our services based on your feedback!</center></h3>
                <p class="text"><center>Go back to the <a href="http://localhost/organicX/product/home.php">homepage</a>.</center></p>
            </div>
        </div>
    </div>

</body>
</html>



';


?>