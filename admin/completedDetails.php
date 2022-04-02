<?php include("partials/header.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS style sheet -->
    <link rel="stylesheet" href="viewOrderStyle.css">


    <style>
        body {
            background-color: #CDF2CA ;
            font-family: 'Magra', sans-serif;
        }

        #details-table {
            width: 50%;
            height: 50%;
            margin-bottom: 5%;
            margin-top: 50px;
        }

        #details-td {
        height: 50px;
        padding-left: 8px;
        border: 1px solid black;

        }
    </style>

    <title>Product Ordered Details</title>
</head>
<body>
    <center>
    <h1 class="mt-5">Product Ordered Details</h1>
    <hr>
    <table id=details-table>
        <?php
        if (isset($_GET['custID'])) {
            $cust_id = $_GET['custID'];
        //// show all the 'To Ship' order records according to specific user's id ////
        $sql4 = "SELECT * FROM cust_order  WHERE OrderStatus = 'Completed' AND CustID = '$cust_id' " ;
        $run4 = mysqli_query($conn,$sql4);
        while($row_cust_order = mysqli_fetch_assoc($run4)) {
            $order_id = $row_cust_order['OrderID'];
            $cust_id = $row_cust_order['CustID'];
            $order_date = $row_cust_order['OrderDate'];
            $order_status = $row_cust_order['OrderStatus'];
            $sub_total = $row_cust_order['SubTotal'];

            $sql1 = "SELECT * FROM product_ordered WHERE OrderID = '$order_id'";
            $run1 = mysqli_query($conn,$sql1);
            while($row_product_ordered = mysqli_fetch_array($run1)) {
                // $order_id = $row_product_ordered['OrderID'];
                $pro_id = $row_product_ordered['ProductID'];
                $quantity = $row_product_ordered['Quantity'];
            
            $sql2 = "SELECT * FROM product WHERE ProID = '$pro_id'";
            $run2 = mysqli_query($conn,$sql2);
            while($row_product = mysqli_fetch_array($run2)) {
                // $order_id = $row_product_ordered['OrderID'];
                $pro_name = $row_product['ProName'];

    ?>
        <td id="details-td"> <?php echo $pro_name;?> x <?php echo $quantity;?> </td>
    </tr>
<?php }}}} ?>
</table>
<a class="btn btn-lg btn-success" href="../admin/completed.php" role="button">&laquo; Back to Customers' Order Page </a>

</center>
</body>
</html>

     
