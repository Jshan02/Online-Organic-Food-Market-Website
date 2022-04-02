<?php include("partials/header.php");?>
<form action="" method="POST" enctype="multipart/form-data">
<h1 class="ml-5 mt-5 pt-5">Add Item</h1>
  <div class="row" >
      <div class="col-md-4 order-md-2 mb-4 mx-auto mt-5 pt-5 ">
  

          <div class="mb-3">
          <label for="inlineFormInput">Product Name</label>
          <div class="input-group">
              <input type="text" name="ProName" class="form-control" id="inlineFormInput" placeholder="What is the Product Name?" required>
          </div>
          </div>

          <div class="mb-3">
          <label for="exampleFormControlTextarea1">Product Description</label>
          <textarea class="form-control" name="ProDetails" id="exampleFormControlTextarea1" rows="3" placeholder="Tell more about the products..." required></textarea>
          </div>

          <div class="mb-3">
              <label for="price">Price</label>
              <input type="float" name="Price" class="form-control" id="price" placeholder="Enter Price..." required>
          </div>

          <div class="mb-3">
              <label for="category">Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="Category">
                  <option value = "Rice">Rice</option>
                  <option value = "Noodle">Noodle</option>
                  <option value = "Snacks">Snacks</option>
                  <option value = "Cereal">Cereal</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="price">Product Photo</label>
              <div class="custom-file">
                  <input type="file" name="Photos" class="custom-file-input" id="photo" required>
                  <label class="custom-file-label" for="photo">Choose Product Photo...</label>
              </div>
          </div>

          <div class="mb-3">
              <label for="stock">Stock Available</label>
              <input type="number" name="Stock" class="form-control" id="stock" placeholder="How many stocks available?" required>
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Add Item</button>

          
      </div>
  </div>
</form>
<?php
    if(isset($_POST['submit']))
    {
        $ProName = $_POST['ProName'];
        $ProDetails = $_POST['ProDetails'];
        $Price = $_POST['Price'];
        $Category = $_POST['Category'];
        $Stock = $_POST['Stock'];


        if(isset($_FILES['Photos']['name']))
        {
            $Photos = $_FILES['Photos']['name'];
            $image = explode('.', $Photos);
            $ext = end($image);
            $Photos = rand(000,999).".".$ext;
            $source = $_FILES['Photos']['tmp_name'];
            $destination = "../product/productPhoto/".$Photos;
            $upload = move_uploaded_file($source, $destination);
        }
        else{
            $Photos="";
        }

        $sql = "INSERT INTO product SET
            ProName = '$ProName',
            ProDetails = '$ProDetails',
            Price = $Price,
            Category = '$Category',
            Photos = '$Photos',
            Stock = $Stock ";

        $res = mysqli_query($conn,$sql);

        if($res == true)
        {   echo "<script>window.location.href = 'adminhome.php';</script>";
            $_SESSION['add'] = "<div class='text-success ml-5'>Product Added Successfully.</div>";
        }

    }
include("partials/footer.php");
?>