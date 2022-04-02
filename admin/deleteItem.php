<?php
    session_start();
    include("partials/database.php");

    if(isset($_SESSION["user"])){
        header("Location: ../general/LogIn.php");
    }

    if(isset($_GET['ProID']) AND isset($_GET['Photos']))
    {
        $ProID = $_GET['ProID'];
        $Photos = $_GET['Photos'];

        if($Photos != "")
        {
            $destination = "../product/productPhoto/".$Photos;
            $delete = unlink($destination);

            if($delete == false)
            {
                $_SESSION['upload'] = "<div class='text-danger ml-5'>Photo Delete Failed.</div>";
                header('location:adminhome.php');
                die();
            }
        }
        $sql = "DELETE FROM product WHERE ProID = $ProID";
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='text-danger ml-5'>Product Deleted Successfully.</div>";
            header('location:adminhome.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='text-danger ml-5'>Failed to Delete Food.</div>";
            header('location:adminhome.php');
        }
    }
    else
    {
        $_SESSION['unauthorized'] = "<div class='text-danger ml-5'>Unauthorized Access.</div>";
        header('location:adminhome.php');
    }
?>