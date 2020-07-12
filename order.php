<?php

require_once ("./database/db.php"); 
require_once ("./functions/functions.php");

?>


<?php

if(isset($_GET['c_id'])) {

	$customer_id = $_GET['c_id'];

}

$ip_address = getRealUserIp();

$status = "pending";
$invoice_no = mt_rand();

$get_carts = "SELECT * FROM tbl_cart WHERE ip_address = '$ip_address'";
$run_carts = mysqli_query($conn, $get_carts);

while ($rows_carts = mysqli_fetch_array($run_carts)) {
	$pro_id = $rows_carts['p_id'];
	$pro_qty = $rows_carts['qty'];
	$pro_size = $rows_carts['size'];

	$get_products = "SELECT * FROM tbl_products WHERE product_id = '$pro_id'";
	$run_products = mysqli_query($conn, $get_products);

	while ($rows_products = mysqli_fetch_array($run_products)) {
		$sub_total = $rows_products['product_price'] * $pro_qty;

		$insert_customer_order = "INSERT INTO `tbl_customer_orders` (`customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES ('$customer_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', NOW(), '$status')";
		$run_customer_order = mysqli_query($conn, $insert_customer_order);

		$insert_pending_order = "INSERT INTO `tbl_pending_orders` (`customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES ('$customer_id', '$invoice_no', '$pro_id ', '$pro_qty', '$pro_size', '$status')";
		$run_pending_order = mysqli_query($conn, $insert_pending_order);


		$get_delete_cart = "DELETE FROM tbl_cart WHERE ip_address = '$ip_address'";
		$run_delete_cart = mysqli_query($conn, $get_delete_cart);

		echo "<script>alert('Your Order has been submitted, Thank you')</script>";
		echo "<script>window.open('customer-profile/my_account.php?my_orders', '_self')</script>";

	}

}