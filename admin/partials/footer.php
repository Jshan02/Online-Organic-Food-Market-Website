<footer id="footer" class="pt-4 md-5 pt-md-5 border-top bg-dark px-5 pb-3 text-center">
    <div class="row">
      <div class="col-6 col-md">
        <h5>Organic-X (Admin)</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="adminhome.php">Home Page</a></li>
          <li><a class="text-muted" href="addItem.php">Add Product</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Customer's Order</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="toShip.php">To Ship</a></li>
          <li><a class="text-muted" href="toReceive.php">To Receive</a></li>
          <li><a class="text-muted" href="completed.php">Completed</a></li>
        </ul>
      </div>
      <!-- <div class="col-6 col-md">
        <h5>Support</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="../faq/faq.php">FAQs</a></li>
          <li><a class="text-muted" href="../contactUs/contactUs.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Follow Us On</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="https://www.facebook.com/Organic-X-103220925584579"> <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> </a></li> <br>
          <li><a class="text-muted" href="https://www.instagram.com/organicx123/"> <button type="button" class="btn btn-outline-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> </a></li>
        </ul>
      </div> -->
      <!-- <div class="col-6 col-md">
        <h5>Keep In Touch With Us</h5>
        <ul class="list-unstyled text-small">
          <li><p class="text-muted">Stay Up-To-Date with Our Latest Promotions and Offers!</p></li>
          <li>
            <form method="POST" class="form-inline">
              <input name="email" class="form-control mr-sm-2" type="email" placeholder="Enter Email" aria-label="Enter Email" required>
              <input type="submit" name="subscribe" value="Subscribe Now!" class="btn btn-outline-success my-2 my-sm-0">
            </form>
            <?php
            if(isset($_POST['subscribe']))
            {
              $email = $_POST['subscribe'];
              if ($email != "")
              {
                echo "<script>alert('Email has been uploaded. Thank you for Subscribing with Us!')</script>";
              }

            }
            
            
              
            ?>
          </li>
        </ul>
      </div> -->
    </div>
    <small class="d-block mb-3 text-muted text-center">Copyright &copy; 2022 Organic-X. All Rights Reserved.</small>
    <!-- <div class="col-6 col-md ">
      <ul class="list-unstyled text-small text-center">
        <li><a class="text-muted" href="../product/term.php">Terms and Conditions &nbsp;</a> <a class="font-weight-normal text-body">| &nbsp;</a> <a class="text-muted" href="../product/privacy.php">Privacy Policy</a></li>
      </ul>
    </div> -->
  </footer>
  <!-- jQuery and Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>