<?php
    include '../condb.php';

    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../general/LogIn.php");
  }

    // Click Receive button

    if (isset($_GET['shipID'])) {
        $id = $_GET['shipID'];
            
        $update = "UPDATE cust_order SET OrderStatus='To Receive' WHERE OrderID ='$id' ";
        $run_update = mysqli_query($conn,$update);
        if($run_update === true) {
            echo "<script>alert('Customer order is shipped out!')
            location = 'toReceive.php'</script>";

        }else {
            echo "Failed, Please Try Again.";
    }
}       
?>