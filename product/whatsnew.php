<?php include ("partials/database.php");
include("partials/header.php");
  //Create SQL Query to Display CAtegories from Database
  $sql = "SELECT * FROM product ORDER BY ProID DESC LIMIT 6";
  //Execute the Query
  $res = mysqli_query($conn, $sql);
?>


<div class="album py-5" style="background-color: #CDF2CA;">
  <h1 class="ml-5 pt-5 mt-5">What's New</h1>
  <div class="container ">
    <div class="row">
      <?php while($row=mysqli_fetch_assoc($res)):
      
          $ProID = $row['ProID'];
          $ProName = $row['ProName'];
          $Photos = $row['Photos'];
      ?>
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            
          <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="productPhoto/<?php echo $Photos; ?>" alt="<?= $ProName;?>"></svg>

          <div class="card-body">
            <h3 class="text-center card-text"><?php echo $ProName; ?></h3>
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
    
<?php include("partials/footer.php");?>