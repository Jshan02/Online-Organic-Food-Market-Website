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
    <link rel="stylesheet" href="add2.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Edit Address</title>
</head>

<body>
    <?php include "../product/partials/header.php"; ?>

    <div class="title"><h2>Edit Current Address</h2></div><hr>

    <?php
        // If user click "Edit" button
        if(isset($_GET["clicked"])){
            $addressID = (int)$_GET["clicked"];

            // Read the data of that address ID
            $sql = "SELECT * FROM address WHERE AddressID = '$addressID' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            $addressInfo = mysqli_fetch_assoc($result);
            $name = $addressInfo["Name"];
            $phone = $addressInfo["Phone"];
            $address = $addressInfo["Address"];
            $postcode = $addressInfo["Postcode"];
        }
    ?>

    <div class="addBox">
        <!-- Display the Edit Address Form -->
        <form action="" method="POST">
            <div class="fill">
                <!-- Display the original data in each field -->
                <label for="name">Name</label><br>
                    <input type="text" name="name" class="form-control input-lg" value="<?php echo $name?>" required><br>
                <label for="contactNo">Phone Number</label><br>
                    <input type="tel" name="phone" class="form-control input-lg" value="<?php echo $phone?>" maxlength=12 
                    pattern="[0-9]{3}-[0-9]{7}" required><br>
                <label for="address">Address</label><br>
                    <input type="text" name="address" class="form-control input-lg" value="<?php echo $address?>" required><br>
                <label for="postcode">Postcode</label><br>
                    <input type="text" name="postcode" class="form-control input-lg" value="<?php echo $postcode?>" maxlength=5 
                    pattern="[0-9]{5}" required><br>
            </div>
            
            <div class="confirm">
                <!-- Cancel button -->
                <a href="address2.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                <!-- Submit button -->
                <button type="submit" name="edit" class="btn btn-success">Confirm</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>

    <?php
        // If user click submit the edited form
        if(isset($_POST["edit"])){
            // Get data in all input field again
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $postcode = $_POST["postcode"];

            // Update the data stored in database
            $sql = "UPDATE address 
            SET Name='$name', Address='$address', Phone='$phone', Postcode='$postcode' 
            WHERE AddressID='$addressID'";
            $result = mysqli_query($conn, $sql);

            if($result){
                // If successfully update
                echo "<script>alert('Address successfully edited!')
                location = 'address2.php'</script>";
            }else{
                // If update fail
                echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
            }
        }
    ?>

    <br><br>

    <div class="footer"><?php include "../product/partials/footer.php";?></div>
</body>
</html>