<?php
session_start();

if (!isset($_SESSION["user"])){
    header("Location: ../general/LogIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact form</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <?php include("../product/partials/header.php");?>

    <div class="container">
        <br>
        <br>
        <br>
        <h1 class="mt-5 pt-5"><center>Contact Us!</h1></center>
        <h2 class="contact-h2"><center>Give us your feedback to help us grow!</center></h2>
        <p class="contact-p"><center>We value your suggestion and want to know how we can continuously improve to best serve you.</center><br></p>

        <form action="mail.php" method="POST" name="form" enctype="multipart/form-data">
            <div class="row" >
                <div class="col-md-5 order-md-2 mb-4 mx-auto">
            
                    <div class="mb-3">
                    <label for="inlineFormInput">Name*</label>
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="What is your Name?" required>
                        </div>
                    </div>

                    <div class="mb-3">
                    <label for="inlineFormInput">Email*</label>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email.." required>
                        </div>
                    </div>

                    <div class="mb-3">
                    <label for="inlineFormInput">Phone Number*</label>
                        <div class="input-group">
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter phone number..." required>
                        </div>
                    </div>

                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1">Feedback*</label>
                    <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3" placeholder="Let us know your feedback..." required></textarea>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg btn-block" name="send" type="submit">Send</button>

                </div>
            </div>
        </form>
    </div>

    <?php include("../product/partials/footer.php");?>
</body>
</html>

