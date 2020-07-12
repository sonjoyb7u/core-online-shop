
<?php

	$customer_session = $_SESSION['customer_email'];

	$get_customer = "SELECT * FROM tbl_customers WHERE customer_email = '$customer_session'";
	$run_customer = mysqli_query($conn, $get_customer);

	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id = $row_customer['customer_id'];
	$customer_name = $row_customer['customer_name'];
	$customer_email = $row_customer['customer_email'];
	$customer_pass = $row_customer['customer_pass'];
	$customer_country = $row_customer['customer_country'];
	$customer_city = $row_customer['customer_city'];
	$customer_contact = $row_customer['customer_contact'];
	$customer_address = $row_customer['customer_address'];
	$customer_image = $row_customer['customer_image'];
?>

<h2 align="center">Edit Your Account</h2>

<?php

	$data = $_POST;
	$file = $_FILES;
	if(isset($data['update_account'])) {
		$update_id = $customer_id;
		$c_name = $data['c_name'];
		$c_email = $data['c_email'];
		$c_country = $data['c_country'];
		$c_city = $data['c_city'];
		$c_contact = $data['c_contact'];
		$c_address = $data['c_address'];

		$c_img_name = $file['c_image']['name'];
		$customer_img_name = $customer_image;

		if(!isset($c_img_name)) {
			$update_account = "UPDATE `tbl_customers` SET `customer_name`='$c_name',`customer_email`='$c_email',`customer_country`='$c_country',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address', `customer_image`= '$customer_img_name' WHERE customer_id = '$update_id'";
			$run_update_account = mysqli_query($conn, $update_account);

			echo "<script>alert('Your Profile account has been Updated please login again.')</script>";
			echo "<script>window.open('logout.php', '_self')</script>";
			

		} 
		else {
			$c_img_name1 = explode('.', $c_img_name);
			$c_img_ext = end($c_img_name1);
			$new_c_img_name = rand(0, 1000) . "." . "$c_name" . "." .$c_img_ext;
			$c_img_tmp = $file['c_image']['tmp_name'];

			$update_account = "UPDATE `tbl_customers` SET `customer_name`='$c_name',`customer_email`='$c_email',`customer_country`='$c_country',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address',`customer_image`='$new_c_img_name' WHERE customer_id = '$update_id'";
			$run_update_account = mysqli_query($conn, $update_account);

	    	move_uploaded_file($c_img_tmp, "uploads/images/$new_c_img_name");
			echo "<script>alert('Your Profile account has been Updated please login again.')</script>";
			echo "<script>window.open('logout.php', '_self')</script>";

		}


	}


?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="customer_name">Customer Name</label>
		<input type="text" id="customer_name" name="c_name" class="form-control" value="<?= $customer_name; ?>">
	</div>
	<div class="form-group">
		<label for="customer_email">Customer Email</label>
		<input type="text" id="customer_email" name="c_email" class="form-control" value="<?= $customer_email; ?>">
	</div>
	<div class="form-group">
		<label for="customer_country">Customer Country</label>
		<input type="text" id="customer_country" name="c_country" class="form-control" value="<?= $customer_country; ?>">
	</div>
	<div class="form-group">
		<label for="customer_city">Customer City</label>
		<input type="text" id="customer_city" name="c_city" class="form-control" value="<?= $customer_city; ?>">
	</div>
	<div class="form-group">
		<label for="customer_contact">Customer Contact</label>
		<input type="text" id="customer_contact" name="c_contact" class="form-control" value="<?= $customer_contact; ?>">
	</div>
	<div class="form-group">
		<label for="customer_address">Customer Address</label>
		<input type="text" id="customer_address" name="c_address" class="form-control" value="<?= $customer_address; ?>">
	</div>
	<div class="form-group">
		<label for="customer_iamge">Customer Image</label>
		<input type="file" id="customer_image" name="c_image" class="form-control" required="">
		<img src="uploads/images/<?= $customer_image; ?>" alt="Customer Image" width= 100px; height= 100px; class="img-responsive">
	</div>
	<div class="text-center">
		<button class="btn btn-primary" name="update_account"><i class="fa fa-user"></i>&nbsp;&nbsp;Update Now</button>
		
	</div>
	
</form>


