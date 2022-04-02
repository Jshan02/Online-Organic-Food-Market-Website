<?php include ("partials/database.php");
include("partials/header.php");;
//CHeck whether id is passed or not
if(isset($_GET['Category']))
{
    //Category id is set and get the id
    $Category = $_GET['Category'];
    // Get the CAtegory Title Based on Category ID
    $sql = "SELECT * FROM product WHERE Category='$Category'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);
}
else
{
    $sql = "SELECT * FROM product WHERE Category='Rice'";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
}
?>
    




<ul class="nav nav-pills nav-fill mt-5 pt-5">
<li class="nav-item">
    <a class="nav-link btn-outline-success" href="whatwehave.php?Category=Rice">Rice</a>
</li>
<li class="nav-item">
    <a class="nav-link btn-outline-success" href="whatwehave.php?Category=Noodle">Noodle</a>
</li>
<li class="nav-item">
    <a class="nav-link btn-outline-success" href="whatwehave.php?Category=Snacks">Snacks</a>
</li>
<li class="nav-item">
    <a class="nav-link btn-outline-success" href="whatwehave.php?Category=Cereal">Cereal</a>
</li>
</ul>


<div class="album py-5" style="background-color: #CDF2CA;">
<h1 class="ml-5">What We Have</h1>
    <div class="container ">
    <div class="row">
        <?php while($row=mysqli_fetch_assoc($res)):
        
            $ProID = $row['ProID'];
            $ProName = $row['ProName'];
            $Photos = $row['Photos'];
            $Price = $row['Price'];
        ?>
        <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="productPhoto/<?php echo $Photos; ?>" alt="<?= $ProName;?>"></svg>

            <div class="card-body">
            <h3 class="text-center card-text"><?php echo $ProName; ?></h3>
            <h3 class="text-center card-text">RM <?php echo $Price; ?></h3>
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