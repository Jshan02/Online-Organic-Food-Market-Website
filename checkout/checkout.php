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
    <link rel="stylesheet" href="checkout.css">
    <style>
        .proPicDiv{
            float: left;
            margin-right: 20px;
            margin-left: 15px;
            margin-top: 20px;
        }

        .proPicDiv img{
            height: 200px;
            object-fit: contain;
        }

        .proDetails{
            padding-top: 30px;
        }

        p{
            font-size: 18px;
        }
    </style>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/55aa614410.js" crossorigin="anonymous"></script>

    <title>Checkout</title>
</head>
<body>
    <?php include "../product/partials/header.php"; ?>

    <div class="nav"><nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../product/home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../shoppingCart/cart.php">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </nav></div>

    <form action="" method="POST">

        <?php
            // get customer ID
            $sql1 = "SELECT * FROM customer WHERE CustUsername='$_SESSION[user]' LIMIT 1";
            $result1 = mysqli_query($conn, $sql1);
            $custInfo = mysqli_fetch_assoc($result1);
            $custID = $custInfo["CustID"];

            // get current date
            $date = date("Y-m-d");
        ?>

        <div class="title"><h2>Shipping Details</h2><hr></div>

        <div class="shipAddress">
            <div class="card">
                <div class="card-header">
                    Shipping Address
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <!-- List all shipping address stored -->
                        <?php 
                            // get customer stored address
                            $sql2 = "SELECT * FROM address WHERE CustID='$custID'";
                            $result2 = mysqli_query($conn, $sql2);

                            if(mysqli_num_rows($result2) > 0){
                                while($addressInfo = mysqli_fetch_assoc($result2)){
                                    $addressID = $addressInfo["AddressID"];
                                    $name = $addressInfo["Name"];
                                    $address = $addressInfo["Address"];
                                    $phone = $addressInfo["Phone"];
                            ?>
                            <input type="radio" name="shipAddress" id="shipAddress" value="<?php echo $addressID; ?>" required>
                            <label for="shipAddress"><?php echo $name," (", $phone, ") ", ": ", $address; ?></label><br>

                        <?php }} ?>
                        
                        <a href="checkAddAddress.php"><button type="button" class="btn btn-outline-success" style="float: right;">Add New Address</button></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="deliveryOpt">
            <div class="card">
                <div class="card-header">
                    Delivery Options
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <!-- List all delivery method -->
                        <input type="radio" name="deliveryMethod" id="deliveryMethod" value="standard delivery" required>
                        <label for="deliveryMethod">
                            Standard Delivery (Est. Arrival <?php echo date("Y-m-d", strtotime($date. "+2 days")); ?>)
                        </label><br>

                        <input type="radio" name="deliveryMethod" id="deliveryMethod" value="same day delivery">
                        <label for="deliveryMethod">
                            Same Day Delivery (Est. Arrival <?php echo $date; ?>)
                        </label><br>
                    </li>

                    <li class="list-group-item">
                        <!-- List all delivery time -->
                        <label for="deliveryTime">
                            <input type="radio" name="deliveryTime" id="deliveryTime" value="Office Hour" required>
                            Office Hour (9am-5pm)
                        </label><br>

                        <label for="deliveryTime">
                            <input type="radio" name="deliveryTime" id="deliveryTime" value="Any Time">
                            Any Time (Full Day)
                        </label><br>
                    </li>
                </ul>
            </div>
        </div>

        <div class="title"><h2>Order Details</h2><hr></div>

        <div class="itemBox">
            <div class="card">
                <ul class="list-group list-group-flush">
                    
                <?php
                    // Set subtotal to 0
                    $subTotal = 0;
                    // Select all records in the customer cart
                    $sql3 = "SELECT * FROM cart WHERE CustUsername='$_SESSION[user]'";
                    $result3 = mysqli_query($conn, $sql3);

                    // If there is any record
                    if(mysqli_num_rows($result3)>0){
                        // Get the items' details
                        while($cartInfo = mysqli_fetch_assoc($result3)){
                            $proID = $cartInfo["ProID"];
                            $unitPrice = $cartInfo["Price"];
                            $quantity = $cartInfo["Quantity"];
                            $subPrice = $cartInfo["Subtotal"];
                            // Add the price of the item to the subtotal
                            $subTotal += $subPrice;

                            // Get the product's picture and name
                            $sql4 = "SELECT * FROM product WHERE ProID='$proID'";
                            $result4 = mysqli_query($conn, $sql4);
                            $proInfo = mysqli_fetch_assoc($result4);
                            $proPhoto = $proInfo["Photos"];
                            $proName = $proInfo["ProName"];
                ?>

                    <!-- Display the items in the cart -->
                    <li class="list-group-item">
                        <div class="proPicDiv">
                            <img src="../product/productPhoto/<?php echo $proPhoto; ?>" class="proPic" alt="product photo">
                        </div>

                        <div class="proDetails">
                            <h3><?php echo $proName; ?></h3><br>
                            <p>Unit Price: RM<?php echo $unitPrice; ?><br>
                            Quantity: <?php echo $quantity; ?></p>
                        </div>

                        <div class="clear"></div>
                    </li>
                <?php }} ?>
                </ul>
            </div>
        </div>

        <div class="title"><h2>Payment Details</h2><hr></div>

        <div class="paymentOpt">
            <div class="card">
                <div class="card-header">
                    Payment Method
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <table style="width:100%;">
                            <tr>
                                <td style="padding: 10px; vertical-align: top;">
                                    <!-- List all payment method -->
                                    <label for="payMethod">
                                        <input type="radio" name="payMethod" id="payMethod" value="Cash On Delivery" required>
                                        Cash On Delivery
                                    </label><br>
                                </td>
                                <td style="padding: 10px; vertical-align: top;">
                                    <label for="payMethod">
                                        <input type="radio" name="payMethod" id="payMethod" value="Online Banking">
                                        Online Banking<br>Bank Name: Public Bank<br>Account Number: 1234567890<br>Account Holder: OrganicXSdnBhd
                                    </label><br>
                                </td>
                                <td style="padding: 10px; vertical-align: top;">
                                    <label for="payMethod">
                                        <input type="radio" name="payMethod" id="payMethod" value="Touch N Go">
                                        Touch N Go E-wallet<br>OrganicXSdnBhd<br>012-3456789 
                                    </label><br>
                                </td>
                            </tr>
                            <tr>
                                <!-- For customer upload receipt -->
                                <td colspan="3" style="padding: 10px;">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                            <label class="custom-file-label" for="inputGroupFile03">Upload your payment receipt here...</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                
                            </tr>
                        </table>
                    </li>
                </ul>
            </div>
        </div>

        <div class="title"><hr></div>

        <!-- Calculate the grand total -->
        <?php $total = $subTotal + 8; ?>

        <div class="amount">
            <p>Subtotal: RM<?php echo $subTotal ?><br>
            Shipping Fee: RM8.00<br></p>
            <h3>Grand Total: RM<?php echo $total; ?></h3>
        </div>

        <div class="submitbtn">
            <button type="submit" name="order" class="btn btn-danger btn-lg">Place Order</button>
        </div>

        <div class="clear"></div>

    </form>

    <?php
        if(isset($_POST["order"])){
            // get the customer's selection
            $deliveryOpt = $_POST["deliveryMethod"];
            $deliveryTime = $_POST["deliveryTime"];
            $paymentMethod = $_POST["payMethod"];
            $shippingFee = 8.00;

            // insert the order into the order table
            $sql5 = "INSERT INTO cust_order (CustID, OrderDate, OrderStatus, SubTotal, DeliveryOption, DeliveryTime, ShippingFee, Total, PaymentMethod) 
            VALUES ('$custID', '$date', 'To Ship', '$subTotal', '$deliveryOpt', '$deliveryTime', '$shippingFee', '$total', '$paymentMethod')";
            $result5 = mysqli_query($conn, $sql5); 

            // get the new inserted order ID
            $sql6 = "SELECT * FROM cust_order WHERE CustID='$custID' AND OrderDate='$date' AND SubTotal='$subTotal'";
            $result6 = mysqli_query($conn, $sql6); 
            $orderInfo = mysqli_fetch_assoc($result6);
            $orderID = $orderInfo["OrderID"];
            
            $sql9 = "SELECT * FROM cart WHERE CustUsername='$_SESSION[user]'";
            $result9 = mysqli_query($conn, $sql9);
            if(mysqli_num_rows($result9)>0){
                while($cartInfo = mysqli_fetch_assoc($result9)){
                    $proID = $cartInfo["ProID"];
                    $quantity = $cartInfo["Quantity"];

                    // Insert the product ordered into the database
                    $sql10 = "INSERT INTO product_ordered (OrderID, ProductID, Quantity) VALUES ('$orderID', '$proID', '$quantity')";
                    $result10 = mysqli_query($conn, $sql10);

                    // Delete the items ordered from the cart database
                    $sql11 = "DELETE FROM cart WHERE CustUsername='$_SESSION[user]' AND ProID='$proID' AND Quantity='$quantity'";
                    $result11 = mysqli_query($conn, $sql11);

                    if($result11){
                        // Order placed successfully
                        echo "<script>alert('Order Successfully Placed!')
                        location = '../viewOrder/toShip.php'</script>";
                    } else{
                        // Order fails
                        echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
                    }
                }
            }
        }
    ?>

    <?php include "../product/partials/footer.php"; ?>
</body>
</html>