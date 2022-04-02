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
    <link rel="stylesheet" href="../address/add2.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Add New Address</title>
</head>

<body>
    <?php include "../product/partials/header.php"; ?>

    <div class="title"><h2>Add New Address</h2></div><hr>

    <div class="addBox">
        <!-- Add Address Form -->
        <form action="" method="POST">
            <div class="fill">
                <label for="name">Name</label><br>
                    <input type="text" name="name" class="form-control input-lg" placeholder="Enter recipient name..." required><br>
                <label for="contactNo">Phone Number</label><br>
                    <input type="tel" name="phone" class="form-control input-lg" placeholder="Enter recipient contact number (eg. 012-3456789)" maxlength=12 pattern="[0-9]{3}-[0-9]{7}" required><br>
                <label for="address">Address</label><br>
                    <input type="text" name="address" class="form-control input-lg" placeholder="Enter new address..." required><br>
                <label for="postcode">Postcode</label><br>
                    <input type="text" name="postcode" class="form-control input-lg" placeholder="Enter the postcode (eg. 86100)" maxlength=5 pattern="[0-9]{5}" required><br>
            </div>
            
            <div class="confirm">
                <!-- Cancel button: Back to checkout page -->
                <a href="checkout.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                <!-- Submit button -->
                <button type="submit" name="add" class="btn btn-success">Add Address</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>

    <?php
        // If form is submitted
        if(isset($_POST["add"])){
            // Get logged in customer ID
            $sql = "SELECT * FROM customer WHERE CustUsername = '$_SESSION[user]'";
            $result = mysqli_query($conn, $sql);
            $custInfo = mysqli_fetch_assoc($result);
            $id = $custInfo["CustID"];

            // Get data entered in the form
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $postcode = $_POST["postcode"];

            // Insert the data into database
            $sql = "INSERT INTO address (CustID, Name, Address, Phone, Postcode) VALUES ('$id', '$name', '$address', '$phone', '$postcode')";
            $result = mysqli_query($conn, $sql);

            if($result){
                // If success, back to checkout page
                echo "<script>alert('New Address Added!')
                location = 'checkout.php'</script>";
            }else{
                // If fail, alert the user
                echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
            }
        }
    ?>

    <br><br>

    <div class="footer"><?php include "../product/partials/footer.php";?></div>
</body>
</html>