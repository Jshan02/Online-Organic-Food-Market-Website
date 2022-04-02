<?php
    include "../condb.php";
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../general/LogIn.php");
    }

    // Get the address ID
    if(isset($_GET["clicked"])){
        $addressID = (int)$_GET["clicked"];
    }

    // Delete the record from database
    $sql = "DELETE FROM address WHERE AddressID = '$addressID'";
    $result = mysqli_query($conn, $sql);

    if($result){
        // Successfully deleted
        echo "<script>alert('Address successfully deleted!')
        location = 'address2.php'</script>";
    }else{
        // Delete fail
        echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
    }
?>