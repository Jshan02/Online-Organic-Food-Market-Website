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

    <!-- CSS -->
    <link rel="stylesheet" href="rating.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Rating</title>
</head>
<body>
    <?php include "../product/partials/header.php" ?>

    <div class="nav"><nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../product/home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../viewOrder/completed.php">My Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rating</li>
        </ol>
    </nav></div>

    <?php
        // Get the product ID that the customer wants to rate
        if(isset($_GET["ProID"])){
            $proID = (int)$_GET["ProID"];
            $sql = "SELECT * FROM product WHERE ProID='$proID' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            // get the product name, price, and photo
            $proInfo = mysqli_fetch_assoc($result);
            $proName = $proInfo["ProName"];
            $photo = $proInfo["Photos"];
            $price = $proInfo["Price"];
        }
    ?>

    <div class="ratingForm">
        <div class="proPicDiv">
            <!-- Display the product's photo -->
            <img src="../product/productPhoto/<?php echo $photo; ?>" class="proPic" alt="product photo">
        </div>

        <!-- Display product name and unit price -->
        <div class="proDetails">
            <h2><?php echo $proName; ?></h2>
            <h3>RM <?php echo $price; ?></h3>
        </div>

        <div class="clear"></div>

        <form action="" method="POST">
            <div class="rating">
                <!-- <label for="rate"><h3>Rate this Product!</h3></label><br> -->
                <div class="center">
                    <!-- Rating radio button input -->
                    <div class="stars">
                        <input type="radio" id="one" name="rate" value="5" required>
                        <label for="one"></label>
                        <input type="radio" id="two" name="rate" value="4">
                        <label for="two"></label>
                        <input type="radio" id="three" name="rate" value="3">
                        <label for="three"></label>
                        <input type="radio" id="four" name="rate" value="2">
                        <label for="four"></label>
                        <input type="radio" id="five" name="rate" value="1">
                        <label for="five"></label>
                        <span class="result"></span>
                    </div>
                </div>
            </div>

            <!-- Comment textarea -->
            <div class="comment">
                <label for="comment"><h3>Comment</h3></label><br>
                <textarea name="comment" rows="5" cols="114" placeholder="Your comment to this product..."></textarea>
            </div>

            <div class="submitbtn">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>  
    </div>

    <?php
        if(isset($_POST["submit"])){
            $sql = "SELECT * FROM customer WHERE CustUsername = '$_SESSION[user]'";
            $result = mysqli_query($conn, $sql);
            $custInfo = mysqli_fetch_assoc($result);
            $id = $custInfo["CustID"];

            // Get the point of rate (1-5)
            $rate = (int)$_POST["rate"];
            // Get Comment
            $comment = $_POST["comment"];

            // Insert the rating and comment into database
            $sql = "INSERT INTO rating (CustID, ProID, Rating, Comment) VALUES ('$id', '$proID', '$rate', '$comment')";
            $result = mysqli_query($conn, $sql);

            if($result){
                // Success
                echo "<script>alert('Rating submitted!')
                location = '../viewOrder/completed.php'</script>";
            } else{
                // Fail
                echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
            }
        }
    ?>

    <?php include "../product/partials/footer.php" ?>
</body>
</html>