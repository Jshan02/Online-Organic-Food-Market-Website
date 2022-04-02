<?php
include("partials/header.php");
    if(isset($_GET['ProID']))
    {
        $ProID = $_GET['ProID'];
        $sql = "SELECT * FROM product WHERE ProID = $ProID";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $ProName = $row['ProName'];
        $ProDetails = $row['ProDetails'];
        $Price = $row['Price'];
        $Category = $row['Category'];
        $currentPhotos = $row['Photos'];
        $Stock = $row['Stock'];
    }
?>
<h1 class="ml-5 mt-5 pt-5">Manage Item</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4 mx-auto mt-5 pt-5 ">
    

            <div class="mb-3">
            <label for="inlineFormInput">Product Name</label>
            <div class="input-group">
                <input type="text" name="ProName" value="<?php echo $ProName; ?>" class="form-control" id="inlineFormInput" placeholder="What is the Product Name?" required>
            </div>
            </div>

            <div class="mb-3">
            <label for="exampleFormControlTextarea1">Product Description</label>
            <textarea class="form-control" name="ProDetails" id="exampleFormControlTextarea1" rows="3" placeholder="Tell more about the products..." required><?php echo $ProDetails; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="price">Price</label>
                <input type="float" name="Price" value="<?php echo $Price; ?>" class="form-control" id="price" placeholder="Enter Price..." required>
            </div>

            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="Category">
                    <option value = "<?php echo $Category; ?>"><?php echo $Category; ?></option>
                    <option value = "Rice">Rice</option>
                    <option value = "Noodle">Noodle</option>
                    <option value = "Snacks">Snacks</option>
                    <option value = "Cereal">Cereal</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price">Product Photo</label><br>
                <?php
                if($currentPhotos == "")
                {
                    echo "<div class='text-danger ml-5'>None of the photos added.</div>";
                }
                else
                {
                    ?>
                    <img src="../product/productPhoto/<?php echo $currentPhotos; ?>" width="50%">
                    <?php
                }
                ?>
                <div class="custom-file">
                    <input type="file" name="Photos" class="custom-file-input" id="photo">
                    <label class="custom-file-label" for="photo">Choose Product Photo...</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="stock">Stock Available</label>
                <input type="number" name="Stock" value="<?php echo $Stock; ?>" class="form-control" id="stock" placeholder="How many stocks available?" required>
            </div>

            <hr class="mb-4">
            <input type="hidden" name="ProID" value="<?php echo $ProID; ?>">
            <input type="hidden" name="currentPhotos" value="<?php echo $currentPhotos; ?>">
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Update Item</button>

            
        </div>
    </div>
</form>




<?php
    if(isset($_POST['submit']))
    {
        $ProID = $_POST['ProID'];
        $ProName = $_POST['ProName'];
        $ProDetails = $_POST['ProDetails'];
        $Price = $_POST['Price'];
        $Category = $_POST['Category'];
        $currentPhotos = $_POST['currentPhotos'];
        $Stock = $_POST['Stock'];


        if(isset($_FILES['Photos']['name']))
        {
            $Photos = $_FILES['Photos']['name'];
            if($Photos != "")
            {
                $image = explode('.', $Photos);
                $ext = end($image);
                $Photos = rand(000,999).".".$ext;
                $source = $_FILES['Photos']['tmp_name'];
                $destination = "../product/productPhoto/".$Photos;
                $upload = move_uploaded_file($source, $destination);
                if($currentPhotos != "")
                {
                    $deletePhotos = "../product/productPhoto/".$currentPhotos;
                    $delete = unlink($deletePhotos);
                    
                }
            }
            else
            {
                $Photos = $currentPhotos;
            }
            
        }
        else{
            $Photos = $currentPhotos;
        }

        $sql2 = "UPDATE product SET
            ProName = '$ProName',
            ProDetails = '$ProDetails',
            Price = $Price,
            Category = '$Category',
            Photos = '$Photos',
            Stock = $Stock
            WHERE ProID = $ProID";

        $res2 = mysqli_query($conn,$sql2);

        if($res2 == true)
        {   echo "<script>window.location.href = 'adminhome.php';</script>";
            $_SESSION['update'] = "<div class='text-primary ml-5' >Product Updated Successfully.</div>";
        }
    }
?>
<?php include("partials/footer.php");?>