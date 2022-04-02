<?php
  include "../condb.php";
  session_start();

  if (!isset($_SESSION["user"])){
    header("Location: ../general/LogIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>

    <!-- CSS Style Sheet -->
    <link rel="stylesheet" href="viewOrderStyle.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS Style Sheets -->
    <link rel="stylesheet" href="viewOrderStyle.css">


    <title>View Order</title>
    
</head>
<body>

    <?php include("../admin/partials/header.php");?>

    <section class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Customer's Order - Completed</h2>
        <hr>
    </section>

    <ul class="nav nav-pills nav-fill mt-3 pt-3">
        <li class="nav-item">
            <a class="nav-link btn-outline-success" href="toShip.php">To Ship</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-outline-success" href="toReceive.php">To Receive</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-outline-success" href="completed.php">Completed</a>
        </li>
    </ul>

    <br>
    <br>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Ordered</th>
                    <!-- <th>Quantity</th> -->
                    <th>Order Date</th>
                    <th>Subtotal</th>
                    <th>Order Status</th>
                </tr>
            </thead>

            <tbody>
                <?php 

                    //// check user's id to get the order record ////
                    $sql5 = "SELECT * FROM customer WHERE CustUsername = '$_SESSION[user]'";
                    $run5 = mysqli_query($conn, $sql5);
                    while($row_customer = mysqli_fetch_assoc($run5)) {
                        $cust_id = $row_customer['CustID'];
                    } 

                    //// show all the 'Completed' order records according to specific user's id ////
                    $sql4 = "SELECT * FROM cust_order WHERE OrderStatus = 'Completed' GROUP BY OrderID" ;
                    $run4 = mysqli_query($conn,$sql4);
                    while($row_cust_order = mysqli_fetch_assoc($run4)) {
                        $order_id = $row_cust_order['OrderID'];
                        $cust_id = $row_cust_order['CustID'];
                        $order_date = $row_cust_order['OrderDate'];
                        $order_status = $row_cust_order['OrderStatus'];
                        $sub_total = $row_cust_order['SubTotal'];
                        $total = $row_cust_order['Total'];

                        $sql1 = "SELECT * FROM product_ordered WHERE OrderID = '$order_id' GROUP BY OrderID";
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
                            
                        }}
                ?>

                <tr>
                    <td> <?php echo $order_id;?> </td>
                    <td>
                    <a href="completedDetails.php?orderID=<?php echo $order_id;?>&custID=<?php echo $cust_id;?>">View Details</a></button>
                    </td>
                    <td> <?php echo $order_date;?> </td>
                    <td>RM<?php echo $total;?> </td>
                    <td> <?php echo $order_status;?> </td>
                </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>

    <?php include("../admin/partials/footer.php");?>
</body>
</html>