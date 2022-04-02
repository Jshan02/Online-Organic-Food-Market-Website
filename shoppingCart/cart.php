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

    <!-- font type -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS style sheet -->
    <link rel="stylesheet" href="cartStyles.css">

    <title>Shopping Cart</title>
</head>
<body>
    <?php include "../product/partials/header.php";?>

    <section class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Shopping Cart</h2>
        <hr>
    </section>
    <section id="cart-container" class="container my-5">
    <table width="100%">
        <thead>
            <tr >
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            $total = 0;
            $sql4 = "SELECT * FROM cart WHERE CustUsername  = '$_SESSION[user]'" ;
            $run4 = mysqli_query($conn,$sql4);
            while($row_cart = mysqli_fetch_assoc($run4)) {
                $pro_id = $row_cart['ProID'];
                $quantity = $row_cart['Quantity'];
                $subtotal = $row_cart['Subtotal'];
                $price = $row_cart['Price'];
                $total += $quantity * $price;

                
                $sql2 = "SELECT * FROM product WHERE ProID = '$pro_id'";
                $run2 = mysqli_query($conn,$sql2);
                while($row_product = mysqli_fetch_array($run2)) {
                    // $order_id = $row_product_ordered['OrderID'];
                    $pro_name = $row_product['ProName'];
                    $pro_image = $row_product['Photos'];
                    $price = $row_product['Price']
                    
        ?>
        <tr>
            <td><img id="image" src="../product/productPhoto/<?php echo $pro_image; ?>"/></td>
            <td> <?php echo $pro_name;?></td>
            <td> <?php echo $price;?> </td>
            <td>
                <form action='updateCart.php?' method='GET'>
                <input style="text-align:center" type="number" name= "Quantity" class="form-control" value="<?php echo $quantity;?>" min='1' max='20'>
                <input type="hidden" value="<?php echo $pro_id;?>" name=updateID>
                <input type="submit" class="btn btn-primary btn-sm" value="Update" name="submit">
                </form>
            </td>
            <td> <?php echo $subtotal;?> </td>
            <td>
                <a href="removeCart.php?removeID=<?php echo $pro_id;?>"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
        <?php }}  ?>
        </tbody>
    </table>
    </div>
    </table>
    </section>

    <div id="subtotal">
        <table>
            <tr>
                <td>Subtotal：</td>
                <td>
                    <?php echo $total ?>
                </td>
            </tr>
            <div class="shop-bottom-button">
            <tr>
                <td></td>
                <td class="shop-bottom-button"><a class="btn btn-success btn-lg" href="../checkout/checkout.php" role="button">Checkout</a></td>
            </tr>
            </div>
        </table>
    </div>
    <?php include("../product/partials/footer.php");?>
</body>
</html>
