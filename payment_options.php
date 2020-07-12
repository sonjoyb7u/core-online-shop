<div class="box">

<?php

$customer_email = $_SESSION['customer_email'];

$get_customer = "SELECT * FROM tbl_customers WHERE customer_email = '$customer_email'";
$run_customer = mysqli_query($conn, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

?>

	<h2 class="text-center" style="margin-bottom: 30px;">Payment Option For You</h2>

	<p class="lead text-center">
		<a href="order.php?c_id=<?= $customer_id; ?>" class="btn btn-primary">Pay Offline</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">
				<span class="btn btn-primary">Pay Online with Pay pal</span>
				<img src="admin/images/paypal/paypal-3.png" alt="Paypal img" class="img-responsive" style="margin-top: 20px;">
			</a>
		</p>
	</center>
	




</div>