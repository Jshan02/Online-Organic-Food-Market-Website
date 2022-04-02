<?php
    session_start();
    
    include '../condb.php';

    if (!isset($_SESSION["user"])){
        header("Location: ../general/LogIn.php");
    }

    // Click Remove button

    if (isset($_GET['removeID'])) {
        $pro_id = $_GET['removeID'];
            
        $delete = "DELETE FROM cart WHERE ProID ='$pro_id' AND CustUsername = '$_SESSION[user]'";
        $run_delete = mysqli_query($conn,$delete);
        if($run_delete === true) {
            echo "<script>alert('The item has been removed from your cart!.')
            location = 'cart.php'</script>";

        }else {
            echo "Failed, Please Try Again.";
    }
}       
?>