<?php
	$c_mail = $_SESSION['customer_email'];

	if(isset($_POST['yes_delete'])) {
		$delete_account = "DELETE FROM tbl_customers WHERE customer_email = '$c_mail'";
		$run_delete_account = mysqli_query($conn, $delete_account);

		if($run_delete_account) {
			session_destroy();
			echo "<script>alert('Your account has been deleted, Good-Bye.')</script>";
			echo "<script>window.open('../index.php', '_self')</script>";

		}

	}

	if(isset($_POST['no_delete'])) {
		echo "<script>window.open('my_account.php?my_orders', '_self')</script>";

	}

?>


<h2 class="text-center" style="margin-bottom: 20px;">Do You Really want to Delete your Account ?</h2>

<div class="text-center">
	<div class="row">
		<form action="" method="post">
			<input type="submit" name="yes_delete" class="btn btn-danger" value="Yes, I Want">
			<input type="submit" name="no_delete" class="btn btn-primary" value="No, I Don't">
		</form>
	</div>
</div>