<?php
    include '../condb.php';
    session_start();

    if (!isset($_SESSION["user"])){
        header("Location: ../general/LogIn.php");
    }

    // Update cart item's quantity

    if (isset($_GET['submit'])) {
            $pro_id = $_GET['updateID'];
            $new_quantity = $_GET['Quantity'];

            $update = "UPDATE cart SET Quantity = '$new_quantity' WHERE ProID ='$pro_id' AND CustUsername = '$_SESSION[user]'";
            $run_update = mysqli_query($conn,$update);

            $sql1 = "SELECT * FROM cart WHERE ProID = '$pro_id' AND CustUsername = '$_SESSION[user]'";
            $run1 = mysqli_query($conn, $sql1);
            $row_cart = mysqli_fetch_assoc($run1);
                $price = $row_cart['Price'];
                $quantity = $row_cart['Quantity'];
                $subtotal = $row_cart['Subtotal'];
                $new_subtotal = $quantity  * $price;
            
            $update2 = "UPDATE cart SET Subtotal = '$new_subtotal' WHERE ProID ='$pro_id' AND CustUsername = '$_SESSION[user]'";
            $run_update2 = mysqli_query($conn,$update2);   
                
            if($run_update === true) {
                echo "<script>alert('Your cart has been updated!.')
                location = 'cart.php'</script>";

            }else {
                echo "Failed, Please Try Again.";
                echo $pro_id;
        }
    } 
?>