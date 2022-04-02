<?php
    include '../condb.php';

    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../general/LogIn.php");
  }

    // Click Receive button

    if (isset($_GET['receiveID'])) {
        $id = $_GET['receiveID'];
            
        $update = "UPDATE cust_order SET OrderStatus='Completed' WHERE OrderID ='$id' ";
        $run_update = mysqli_query($conn,$update);
        if($run_update === true) {
            echo "<script>alert('Your order has been received!')
            location = 'completed.php'</script>";

        }else {
            echo "Failed, Please Try Again.";
    }
}       
?>