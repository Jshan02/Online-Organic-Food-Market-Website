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
    <title>About Us</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>

    <!-- font family  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- Style sheet -->
    <link rel="stylesheet" href="aboutUsStyles.css">

</head>
<body>
    <?php include("../product/partials/header.php");?>

    <div class="container-center-horizontal">
        <div class="our-story screen">
            <div class="overlap-group">
                <h1 class="vission-mission-title">Vision and Mission</h1>

                <div class="vision-mission-text">
                    <p class="vision-mission-text">Our mission of “Healty Food, Healthy Life” is to improve the lives of our consumers by providing
                        healthy, high quality, and safe products. <br />Our vision is to become a leading and competitive nutrition,
                        health and healthcare company, and achieve higher shareholder value by becoming the preferred enterprise
                        community, preferred employer and preferred supplier for selling preferred products.
                    </p>
                </div>

                <div class="start-shopping">
                    <a href="../product/whatwehave.php"><button type="button" class="btn btn-success btn-lg">Start Shopping</button></a>
                </div>
            </div>

            <h1 class="our-story-title">Our Story</h1>
            <div class="flex-row">
                <img class="logo-black" src="logo black.png"/>
                <div class="our-story-text">
                    <p>Organic-X was established in January 2000 and is Malaysia's largest nutrition, health and health care
                        company. We have provided various organic health products with more than 1000 brands, from global idols to the
                        most popular ones in the local area.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php include("../product/partials/footer.php");?>
</body>
</html>