<?php include ("partials/database.php");
    include("partials/header.php");
    
  if(!isset($_SESSION["user"])){
	header("Location: ../general/LogIn.php");
  }

    //Create SQL Query to Display CAtegories from Database
    $sql = "SELECT P.*, AVG(R.Rating) FROM product P INNER JOIN rating R ON P.ProID = R.ProID GROUP BY P.ProID HAVING AVG(R.Rating) > 4.8 LIMIT 3";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Create SQL Query to Display CAtegories from Database
    $sql2 = "SELECT P.*, AVG(R.Rating) FROM product P INNER JOIN rating R ON P.ProID = R.ProID GROUP BY P.ProID HAVING AVG(R.Rating) < 4.8 LIMIT 4";
    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);
?>




    <div class="album py-5" style="background-color: #CDF2CA;">
    <h1 class="ml-5 mt-5 pt-5">What's Hot</h1>
        <div class="container ">
        <div class="row">
            <?php while($row=mysqli_fetch_assoc($res)):
            
                $ProID = $row['ProID'];
                $ProName = $row['ProName'];
                $Photos = $row['Photos'];
                $Price = $row['Price'];
                $Sales = $row['Sales'];
                $sql3 = "SELECT AVG(Rating) AS avg FROM rating WHERE ProID='$ProID'";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $Rating = $row3['avg'];
            ?>
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                
                <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="productPhoto/<?php echo $Photos; ?>" alt="<?= $ProName;?>"></svg>

                <div class="card-body">
                <h3 class="text-center card-text"><?php echo $ProName; ?></h3>
                <h3 class="text-center card-text">RM <?php echo $Price; ?></h3>
                <h3 class="text-center card-text text-danger"><?php echo $Sales; ?> Sold</h3>
                <h3 class="text-center card-text text-warning">Rating: <?php echo(round($Rating,2)); ?></h3>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                    <a class="align btn btn-outline-primary" href="details.php?ProID=<?php echo $ProID; ?>" role="button">View Details</a>
                    </div>
                </div>
                </div>
            </div>
            
            </div>
            <?php endwhile;?>
        </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container ">
        <div class="row">

    <?php while($row2=mysqli_fetch_assoc($res2)):
            
            $ProID2 = $row2['ProID'];
            $ProName2 = $row2['ProName'];
            $Photos2 = $row2['Photos'];
            $Price2 = $row2['Price'];
            $Sales2 = $row2['Sales'];
            $sql4 = "SELECT AVG(Rating) AS avg FROM rating WHERE ProID='$ProID2'";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($res4);
            $Rating2 = $row4['avg'];
            ?>
            <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                
                <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="productPhoto/<?php echo $Photos2; ?>" alt="<?= $ProName2;?>"></svg>

                <div class="card-body">
                <h3 class="text-center card-text"><?php echo $ProName2; ?></h3>
                <h3 class="text-center card-text">RM <?php echo $Price2; ?></h3>
                <h3 class="text-center card-text text-danger"><?php echo $Sales2; ?> Sold</h3>
                <h3 class="text-center card-text text-warning">Rating: <?php echo(round($Rating2,2)); ?></h3>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                    <a class="align btn btn-outline-primary" href="details.php?ProID=<?php echo $ProID2; ?>" role="button">View Details</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <?php endwhile;?>
        </div>
        </div>
    </div>
    
<?php include("partials/footer.php");?>