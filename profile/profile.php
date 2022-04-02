<?php
  include "../condb.php";

  session_start();

  if(!isset($_SESSION["user"])){
	header("Location: ../general/LogIn.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>


	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>

	<!-- Font family -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<!-- CSS styles -->
    <link rel="stylesheet" href="profileStyle.css">

</head>
<body>
  	<div class="footer">
		  <?php include("../product/partials/header.php");?>
	</div>

	<center><h1 class="mt-5">My Profile</h1></center>
	<hr>
	
	<?php
		$sql1 = "SELECT * FROM customer WHERE CustUsername = '$_SESSION[user]' ";
		$run1 = mysqli_query($conn, $sql1);
		while($row_cust = mysqli_fetch_assoc($run1)) {
			$cust_id = $row_cust['CustID'];
			$cust_name = $row_cust['CustName'];
			$cust_username = $row_cust['CustUsername'];
			$cust_email = $row_cust['Email'];
			$cust_phone = $row_cust['Phone'];
			$cust_password = $row_cust['CustPassword'];
		}
	?>

	<div class="container">
		<form action="" method="POST">
			<div class="row">
				<div class="col">
					<div class="form-groupname">
						<label for="fullName">Full Name</label>
						<input type="fullname" name = "fullname" class="form-control" value="<?php echo $cust_name;?>" placeholder="Enter full name" required>
					</div>
				</div>
				<div class="col">
					<div class="form-groupname">
						<label for="username">Username</label>
						<input type="username" name="username" class="form-control" value="<?php echo $cust_username;?>" placeholder="Enter username" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="form-groupname">
						<label for="phone">Phone Number</label>
						<input type="tel" name="phone" class="form-control" value="<?php echo $cust_phone;?>" placeholder="+60XXXXXXXXX" required>
									
					</div>
				</div>

				<div class="col">
					<div class="form-groupname">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $cust_email;?>" placeholder="abc@mail.com" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="form-groupname">
						<label for="currentPass">Current Password</label>
						<input type="password" name="currentPass" class="form-control" placeholder="Enter Current Password">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="form-groupname">
						<label for="newPass">New Password</label>
						<input type="password" name="newPass" class="form-control" placeholder="Enter New Password">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-groupname">
						<label for="confirmNewPass">Confirm New Password</label>
						<input type="password" name="confirmNewPass" class="form-control" placeholder="Confirm New Password">
					</div>
				</div>
			</div>
			<div class="button-profile">
				<br>
				<center><button type="submit" name="update" class="btn btn-success btn-lg" >Update</button></center>
				<br><br>
			</div>
		</form>
	</div>
	
    <?php
        if(isset($_POST["update"])){
            $cust_name = $_POST["fullname"];
			$cust_username = $_POST["username"];
            $cust_phone = $_POST["phone"];
            $cust_email = $_POST["email"];
			
			if ($_POST['currentPass'] == "") {

				$sql2 = "UPDATE customer SET CustName='$cust_name', CustUsername='$cust_username', Phone='$cust_phone', Email='$cust_email'
            	WHERE CustUsername = '$_SESSION[user]'";

           		$result = mysqli_query($conn, $sql2);

				if($result){
					$_SESSION['user'] = $_POST["username"];
					echo "<script>alert('Profile successfully updated!')
					location = 'profile.php'</script>";
				}
				else{
					echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
				}
			}
			else{
				if ($_POST['currentPass'] == $cust_password) {
					if ($_POST['newPass'] != "") {

						$new_pass = $_POST['newPass'];

						if ($_POST['confirmNewPass'] ==  $new_pass) {
							$sql2 = "UPDATE customer SET CustName='$cust_name', CustUsername='$cust_username', Phone='$cust_phone', Email='$cust_email', CustPassword='$new_pass' 
							WHERE CustUsername = '$_SESSION[user]'";
			
							$result = mysqli_query($conn, $sql2);
			
							if($result){
								$_SESSION['user'] = $_POST["username"];
								echo "<script>alert('Profile successfully updated!')
								location = 'profile.php'</script>";
							}
							else{
								echo "<script>alert('Oops! Something went wrong, please try again.')</script>";
							}
						}
						else {
							echo "<script>alert('Your new password is not the same! Please re-enter the new password.')</script>";
						}
					}
					else {
						echo "<script>alert('Please enter your new password!')</script>";
					}
				}
				else{
					echo "<script>alert('Your current password is wrong!')</script>";
					}
				}
			}
    ?>

	<?php include("../product/partials/footer.php");?>
</body>
</html>