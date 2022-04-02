<?php
    include "../condb.php";

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

    <!-- CSS -->
    <link rel="stylesheet" href="address.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="bootstrap.css"/>
    <script src="bootstrap.js"></script>

    <title>My Address</title>
</head>

<body>
    <?php include ("../product/partials/header.php");?>
   
    <div>
        <h1>My Addresses</h1><hr>
    </div>

    <div class="addressBox">
        <?php
            // Get logged in customer ID
            $sql = "SELECT * FROM customer WHERE CustUsername = '$_SESSION[user]'";
            $result = mysqli_query($conn, $sql);
            $custInfo = mysqli_fetch_assoc($result);
            $id = $custInfo["CustID"];
            
            // Read all data stored in the address table that related to this ID
            $sql = "SELECT * FROM address WHERE CustID = '$id'";
            $result = mysqli_query($conn, $sql);

            // If no result stored
            if(mysqli_num_rows($result)==0){
                echo "No address recorded.";
            } else{
                // Get the data if got address stored
                while($addressInfo = mysqli_fetch_assoc($result)){
                    $name = $addressInfo["Name"];
                    $phone = $addressInfo["Phone"];
                    $address = $addressInfo["Address"];
                    $postcode = $addressInfo["Postcode"];
                    $addressID = $addressInfo["AddressID"];
            ?>

                <!-- Display the data in borderless table -->
                <table>
                    <tr>
                        <td>Name</td>
                        <td> <?php echo ": ", $name; ?> </td>
                    </tr>
                    <tr>
                        <td>Phone Number &nbsp;</td>
                        <td> <?php echo ": ", $phone; ?> </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> <?php echo ": ", $address; ?> </td>
                    </tr>
                    <tr>
                        <td>Postcode</td>
                        <td> <?php echo ": ", $postcode; ?> </td>
                    </tr>
                </table>

                <div class="manage">
                    <!-- Display Edit button for each address stored -->
                    <a href="edit.php?clicked=<?php echo $addressID ?>"><button type="button" class="btn btn-outline-success">
                        Edit Address</button></a>
                    <!-- Display Delete button for each address stored -->
                    <a href="delete.php?clicked=<?php echo $addressID ?>"><button type="button" class="btn btn-outline-danger">
                        Delete Address</button></a>
                </div>
                <div class="clear"></div>
                <hr>

            <?php } ?>
        <?php } ?>
    </div>

    <div class="add">
        <a href="add2.php"><button type="button" class="btn btn-success">Add New Address</button></a>
    </div>
    <br><br>

    <?php include "../product/partials/footer.php";?>

</body>
</html>