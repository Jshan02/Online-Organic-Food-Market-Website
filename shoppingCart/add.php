<?php
include("../condb.php"); 
session_start();

if (!isset($_SESSION["user"])){
    header("Location: ../general/LogIn.php");
}


    if (isset($_GET['addID'])) {
        $ProductID = $_GET['addID'];

        $sql1 = "SELECT * FROM product WHERE ProID = '$ProductID'";
        $run1 = mysqli_query($conn,$sql1);
        while ($row=mysqli_fetch_assoc($run1)){
            $ProductName = $row['ProName'];
            $Price = $row["Price"];

        $sql2 = "SELECT * FROM cart WHERE ProID = '$ProductID' AND CustUsername = '$_SESSION[user]'";
        $run2 = mysqli_query($conn, $sql2);
        $count = mysqli_num_rows($run2);

        if($count == 0){    
            $insert = "INSERT INTO cart (CustUsername, ProID, Price, Quantity, SubTotal) 
                VALUES ('$_SESSION[user]','$ProductID', '$Price','1','$Price')";
                $run_insert = mysqli_query($conn, $insert);
                if($run_insert == true){
                    echo "<script>
                        alert('Product is added into the cart.');
                        location = '../product/details.php?ProID=$ProductID';
                        </script>";
                }}
        else {
            $sql3 = "SELECT Quantity FROM cart WHERE ProID = '$ProductID' AND CustUsername = '$_SESSION[user]'" ;
            $run3 = mysqli_query($conn, $sql3);
            while ($row_cart=mysqli_fetch_array($run3)){
                $quantity = $row_cart['Quantity'];
                $new_quantity = $quantity+1;
                $new_subtotal = $Price * $new_quantity;
            
            $update = "UPDATE cart SET Quantity = '$new_quantity', Subtotal = '$new_subtotal' WHERE ProID = '$ProductID' AND CustUsername = '$_SESSION[user]'";
            $run_update = mysqli_query($conn, $update);
            if($run_update == true){
                echo "<script>
                alert('Your cart has been updated.');
                location = '../product/details.php?ProID=$ProductID';
                </script>";
            }
        }
        }
    }}
?>	