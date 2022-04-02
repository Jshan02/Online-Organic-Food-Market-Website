<?php include ("partials/database.php");
include("partials/header.php");
?>


<br><br><br>

<main role="main" class="container ">
<a class="btn btn-lg btn-success mt-5 mb-3" href="home.php" role="button">&laquo; Back to Home </a>
    <?php
        if(isset($_GET['ProID']))
        {
            $ProID = $_GET['ProID'];
            $sql = "SELECT * FROM product WHERE ProID='$ProID'";
            $res = mysqli_query($conn, $sql);
        }
        else
        {
            echo "<script>window.location.href = 'home.php';</script>";
        }
        while($row=mysqli_fetch_assoc($res)):
                        
            $ProID = $row['ProID'];
            $ProName = $row['ProName'];
            $ProDetails = $row['ProDetails'];
            $Price = $row['Price'];
            $Photos = $row['Photos'];
            $Sales = $row['Sales'];
            $Stock = $row['Stock'];
            $sql4 = "SELECT AVG(Rating) AS avg FROM rating WHERE ProID='$ProID'";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($res4);
            $Rating = $row4['avg'];
    ?>
    <div class="jumbotron text-justify">


        <div class="row no-gutters">
            <div class="col-6 col-md-4">
              <img src="productPhoto/<?php echo $Photos; ?>" class="img-thumbnail" alt="...">
            </div>
            <div class="col-sm-6 col-md-8">
                <div class="details" style="width: 100%; -moz-box-sizing: border-box; box-sizing: border-box; padding: 1.25rem 2.1875rem 0 1.25rem;">
                    <h2><?php echo $ProName; ?></h2>
                    <p class="mb-1 text-muted">Product ID: <?php echo $ProID; ?></p>
                    <h2>RM <?php echo $Price; ?></h2>
                    <h5 class="mb-1 text-success">Availability: <?php echo $Stock; ?></h5>
                    <h5 class="mb-1 text-info"><?php echo $Sales; ?> Sold</h5>
                    <br><br>
                    <a class="btn btn-primary btn-lg" href="../shoppingCart/add.php?addID=<?php echo $ProID;?>" role="button">Add to Cart</a>&nbsp;&nbsp;&nbsp;
                    <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Buy Now</a> -->
                </div>
                
            </div>
        </div>
    <h2>Description</h2>
    <p class="lead"><?php echo $ProDetails; ?></p>
    <br><br>
    <h2>Rating</h2>
    <p class="lead"><?php echo(round($Rating,2)); ?> Out of 5.0 </p>
  </div>
  <?php endwhile;?>
</main>

<?php
$sql2 = "SELECT * FROM rating WHERE ProID='$ProID'";
$res2 = mysqli_query($conn, $sql2);

?>
<h1 class="ml-5 pl-5">Comments</h1><br>


<main role="main" class="container">
    <?php
    while($row2=mysqli_fetch_assoc($res2)):
        $CustID = $row2['CustID'];
        $Rating = $row2['Rating'];
        $Comment = $row2['Comment'];
        $sql3 = "SELECT CustName FROM customer WHERE CustID='$CustID'";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($res3);
        $CustName = $row3['CustName']

    ?>
    <div class="jumbotron text-justify py-1">
        <h3><u><?php echo $CustName; ?></u>&nbsp;&nbsp;<i class="fas fa-star text-warning"><?php echo $Rating; ?></i></h3>
        <p class="lead"><?php echo $Comment; ?></p>
    </div>
    <?php endwhile;?>
    
</main>



<?php 
include("partials/footer.php");
?>