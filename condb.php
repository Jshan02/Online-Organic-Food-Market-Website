<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="organicx_database";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Fails.')</script>");
    }
?>