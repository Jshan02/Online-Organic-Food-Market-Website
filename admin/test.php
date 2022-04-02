<tbody>
                <?php 

                    //// check user's id to get the order record ////
                    $sql5 = "SELECT * FROM customer WHERE CustUsername = '$_SESSION[user]'";
                    $run5 = mysqli_query($conn, $sql5);
                    while($row_customer = mysqli_fetch_assoc($run5)) {
                        $cust_id = $row_customer['CustID'];
                    } 

                    //// show all the 'Completed' order records according to specific user's id ////
                    $sql4 = "SELECT * FROM cust_order WHERE OrderStatus = 'Completed' AND CustID = '$cust_id' GROUP BY OrderID" ;
                    $run4 = mysqli_query($conn,$sql4);
                    while($row_cust_order = mysqli_fetch_assoc($run4)) {
                        $order_id = $row_cust_order['OrderID'];
                        $cust_id = $row_cust_order['CustID'];
                        $order_date = $row_cust_order['OrderDate'];
                        $order_status = $row_cust_order['OrderStatus'];
                        $sub_total = $row_cust_order['SubTotal'];

                        $sql1 = "SELECT * FROM product_ordered WHERE OrderID = '$order_id'";
                        $run1 = mysqli_query($conn,$sql1);
                        $itemNo = mysqli_num_rows($run1);
                ?>

                <tr>
                    <td rowspan="<?php echo $itemNo; ?>"> <?php echo $order_id;?> </td>
                    
                <?php
                        while($row_product_ordered = mysqli_fetch_array($run1)) {
                            // $order_id = $row_product_ordered['OrderID'];
                            $pro_id = $row_product_ordered['ProductID'];
                            $quantity = $row_product_ordered['Quantity'];
                        
                        $sql2 = "SELECT * FROM product WHERE ProID = '$pro_id'";
                        $run2 = mysqli_query($conn,$sql2);
                        while($row_product = mysqli_fetch_array($run2)) {
                            // $order_id = $row_product_ordered['OrderID'];
                            $pro_name = $row_product['ProName'];
                            
                        
                        $sql3 = "SELECT * FROM payment WHERE OrderID = '$order_id'";
                        $run3 = mysqli_query($conn,$sql3);
                        while($row_payment = mysqli_fetch_array($run3)) {
                            $total = $row_payment['Total'];
                        }}
                ?>

                
                    <td>
                    <a href="completedDetails.php?orderID=<?php echo $order_id;?>">View Details</a></button>
                    </td>
                    <td> <?php echo $order_date;?> </td>
                    <td>RM<?php echo $total;?> </td>
                    <td> <?php echo $order_status;?> </td>
                    <td>
                    <a href="../rating/rating.php?ProID=<?php echo $pro_id; ?>"><button class="btn btn-outline-success">Rate</button></a> &nbsp;&nbsp;
                    <button class="btn btn-outline-warning"><a href="../product/details.php?ProID=<?php echo $pro_id;?>">Buy Again</a></button>
                    </td>
                </tr>
                <?php }}  ?>
            </tbody>