<?php include ("partials/database.php");
include("partials/header.php");
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
?>
  <!-- Carousel -->
  <div id="testimonials" class="carousel slide" data-ride="carousel" data-interval="2000" data-pause="hover">
    <ol class="carousel-indicators">
      <li data-target="#testimonials" data-slide-to="0" class="active"></li>
      <li data-target="#testimonials" data-slide-to="1"></li>
      <li data-target="#testimonials" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="photo/carousel003.jpg" class="" style="width:640px;height:360px" alt="" >
        <div class="carousel-caption d-none d-md-block">
          <h3>Brown Rice</h3>
          <p>Providing high nutrients with low calories.</p>
          <a class="align btn btn-outline-success" href="details.php?ProID=3" role="button">View Details</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="photo/carousel008.jpg" class="" style="width:640px;height:360px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Organic Baby Noodle</h3>
          <p>Containing Wheat Flour and vegetable powder.</p>
          <a class="align btn btn-outline-success" href="details.php?ProID=8" role="button">View Details</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="photo/carousel013.jpg" class="" style="width:640px;height:360px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Organic Regular Rolled Oat</h3>
          <p>An absolute whole grain that boosts our morning. It's completely a natural without any preservatives, coloring whatsoever.</p>
          <a class="align btn btn-outline-success" href="details.php?ProID=13" role="button">View Details</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#testimonials" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#testimonials" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>


  <?php 
    //Create SQL Query to Display CAtegories from Database
    // $sql = "SELECT * FROM product LIMIT 3";
    $sql = "SELECT P.*, AVG(R.Rating) FROM product P INNER JOIN rating R ON P.ProID = R.ProID GROUP BY P.ProID HAVING AVG(R.Rating) > 4.8 LIMIT 3";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
  ?>


  <div class="album py-5 bg-light">
    <h1 class="ml-5">What's Hot</h1>
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


  <div class="album py-5" style="background-color: #CDF2CA;">
        <h1 class="ml-5">What We Have</h1>
        <div class="container ">
        
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="photo/rice.jpg"></svg>

                        <div class="card-body">
                            <h3 class="text-center card-text">Rice</h3>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a class="align btn btn-outline-primary" href="whatwehave.php?Category=Rice" role="button">View Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="photo/noodle.jpg"></svg>

                        <div class="card-body">
                            <h3 class="text-center card-text">Noodle</h3>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a class="align btn btn-outline-primary" href="whatwehave.php?Category=Noodle" role="button">View Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="photo/snacks.jpg"></svg>

                        <div class="card-body">
                            <h3 class="text-center card-text">Snacks</h3>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a class="align btn btn-outline-primary" href="whatwehave.php?Category=Snacks" role="button">View Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="photo/cereal.png"></svg>

                        <div class="card-body">
                            <h3 class="text-center card-text">Cereal</h3>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a class="align btn btn-outline-primary" href="whatwehave.php?Category=Cereal" role="button">View Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
<?php include("partials/footer.php");?>