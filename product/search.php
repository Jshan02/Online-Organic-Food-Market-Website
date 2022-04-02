<?php include ("partials/database.php");
include("partials/header.php");
//CHeck whether id is passed or not
if(isset($_POST['search']))
{
    //Category id is set and get the id
    $search = $_POST['search'];
    // Get the CAtegory Title Based on Category ID
    $sql = "SELECT * FROM product WHERE ProName LIKE '%$search%' OR ProDetails LIKE '%$search%'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);
    
}
else
{
    $sql = "SELECT * FROM product";

    //Execute the Query
    $res = mysqli_query($conn, $sql);
}
?>
    



<div class="album py-5" style="background-color: #CDF2CA;">
<h1 class="ml-5 mt-5 pt-5">Search Result</h1>
    <div class="container ">
    <div class="row">
    <?php 
    $count = mysqli_num_rows($res);
    if ($count > 0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
        
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
        <?php
        }
    }
    else
    {
        echo "<div class='text-danger'>No Food Found!</div>";

    }
?>
        

    </div>
    </div>
</div>
<?php include("partials/footer.php");?>