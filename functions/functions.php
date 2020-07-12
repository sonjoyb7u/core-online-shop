<?php

function getProducts() {
global $conn;

$get_products = "SELECT * FROM `tbl_products` ORDER BY 1 DESC LIMIT 0, 8";
$run_products = mysqli_query($conn, $get_products);

// print_r($run_products);

while ($row_product = mysqli_fetch_array($run_products)) {
$pro_id = $row_product['product_id'];
$pro_title = $row_product['product_title'];
$pro_img_1 = $row_product['product_img_1'];
$pro_price = $row_product['product_price'];
$pro_desc = $row_product['product_description'];

$products = <<<DELIMETER

<div class="col-sm-3 col-sm-4"><!-- col-md-4 col-sm-6 center-responsive Begin -->
	<div class="product"><!-- product Begin -->
		<a href="details.php?pro_id={$pro_id}">
		  
		  <img class="img-responsive" src="./admin/images/product/{$pro_img_1}" alt="Product 1">
		  
		</a>
		<div class="text"><!-- text Begin -->
			<h3>
				<a href="details.php?pro_id={$pro_id}">
				  {$pro_title}
				</a>
			</h3>
			<p class="price">&#36;{$pro_price}</p>
			<p class="button">
			  
			  <a href="details.php?pro_id={$pro_id}" class="btn btn-default">View Details</a>
			  
			  <a href="details.php?pro_id={$pro_id}" class="btn btn-primary">
			    
			    <i class="fa fa-shopping-cart"></i>
			    &nbsp; Add To Cart
			    
			  </a>
			  
			</p>
		</div><!-- text Finish -->
	</div><!-- product Finish -->
</div><!-- col-md-4 col-sm-6 center-responsive Finish -->


DELIMETER;

echo $products;
	
	}


}


function getProductCategories() {
global $conn;

$get_pro_cats = "SELECT * FROM tbl_product_categories";
$run_pro_cats = mysqli_query($conn, $get_pro_cats);

while($row_pro_cats = mysqli_fetch_array($run_pro_cats)):
$pro_cats_id = $row_pro_cats['p_cat_id'];	
$pro_cats_title = $row_pro_cats['p_cat_title'];

$product_categories = <<<DELIMETER

<li><a href="shop.php?pro_cats_id={$pro_cats_id}">{$pro_cats_title}</a></li>

DELIMETER;

echo $product_categories;

endwhile;


}


function getCategories() {
global $conn;

$get_cats = "SELECT * FROM tbl_categories";
$run_cats = mysqli_query($conn, $get_cats);

while($row_cats = mysqli_fetch_array($run_cats)):
$cats_id = $row_cats['cat_id'];	
$cats_title = $row_cats['cat_title'];

$categories = <<<DELIMETER

<li><a href="shop.php?cats_id={$cats_id}">{$cats_title}</a></li>

DELIMETER;

echo $categories;

endwhile;	

}


function getProCatsClick() {
	global $conn;

	if(isset($_GET['pro_cats_id'])) {
		$pro_cats_id = $_GET['pro_cats_id'];

		$get_pro_cats = "SELECT * FROM tbl_product_categories WHERE p_cat_id = '$pro_cats_id'";

		$run_pro_cats = mysqli_query($conn, $get_pro_cats);

		$rows_pro_cats = mysqli_fetch_array($run_pro_cats);

		$pro_cats_title = $rows_pro_cats['p_cat_title'];
		$pro_cats_desc = $rows_pro_cats['p_cat_description'];

		$get_products = "SELECT * FROM tbl_products WHERE p_cat_id = '$pro_cats_id'";

		$run_products = mysqli_query($conn, $get_products);

		$count_rows = mysqli_num_rows($run_products);

		if($count_rows == 0) {
			echo "<div class='box'>

					<h1>No Product Found in this product category !</h1>
					
				  </div>";

		} else {


		echo "<div class='box'>

				<h1>$pro_cats_title</h1>
				<p>$pro_cats_desc</p>
					
			</div>";


		}

while ($rows_products = mysqli_fetch_array($run_products)) {

	$pro_id = $rows_products['product_id'];
	$pro_title = $rows_products['product_title'];
	$pro_img_1 = $rows_products['product_img_1'];
	$pro_price = $rows_products['product_price'];

$products = <<<DELIMETER

<div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsive Begin -->

    <div class="product"><!-- product Begin -->
 
         <a href="details.php?pro_id={$pro_id}">
             
             <img class="img-responsive" src="admin/images/product/{$pro_img_1}" alt="Product 1">
             
         </a>
 
        <div class="text"><!-- text Begin -->
             
             <h3>
                 <a href="details.php?pro_id={$pro_id}">
                     {$pro_title}
                 </a>
             </h3>
             
             <p class="price">&#36;{$pro_price}</p>
             
             <p class="button">
                 
                 <a href="details.php?pro_id={$pro_id}" class="btn btn-default">View Details</a>
                 
                 <a href="details.php?pro_id={$pro_id}" class="btn btn-primary">
                     
                     <i class="fa fa-shopping-cart"></i>
                         &nbsp; Add To Cart
                     
                 </a>
                 
             </p>
             
        </div><!-- text Finish -->
 
    </div><!-- product Finish -->
     
</div><!-- col-md-4 col-sm-6 center-responsive Finish -->


DELIMETER;

echo $products;


		}


	}


}



function getCatsClick() {
	global $conn;

	if(isset($_GET['cats_id'])) {
		$cats_id = $_GET['cats_id'];

		$get_cats = "SELECT * FROM tbl_categories WHERE cat_id = '$cats_id'";

		$run_cats = mysqli_query($conn, $get_cats);

		$rows_cats = mysqli_fetch_array($run_cats);

		$cats_title = $rows_cats['cat_title'];
		$cats_desc = $rows_cats['cat_description'];

		$get_products = "SELECT * FROM tbl_products WHERE cat_id = '$cats_id'";

		$run_products = mysqli_query($conn, $get_products);

		$count_rows = mysqli_num_rows($run_products);

		if($count_rows == 0) {
			echo "<div class='box'>

					<h1>No Product Found in this category !</h1>
					
				  </div>";

		} else {


		echo "<div class='box'>

				<h1>$cats_title</h1>
				<p>$cats_desc</p>
					
			</div>";


		}

while ($rows_products = mysqli_fetch_array($run_products)) {

	$pro_id = $rows_products['product_id'];
	$pro_title = $rows_products['product_title'];
	$pro_img_1 = $rows_products['product_img_1'];
	$pro_price = $rows_products['product_price'];

$products = <<<DELIMETER

<div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsive Begin -->

    <div class="product"><!-- product Begin -->
 
         <a href="details.php?pro_id={$pro_id}">
             
             <img class="img-responsive" src="admin/images/product/{$pro_img_1}" alt="Product 1">
             
         </a>
 
        <div class="text"><!-- text Begin -->
             
             <h3>
                 <a href="details.php?pro_id={$pro_id}">
                     {$pro_title}
                 </a>
             </h3>
             
             <p class="price">&#36;{$pro_price}</p>
             
             <p class="button">
                 
                 <a href="details.php?pro_id={$pro_id}" class="btn btn-default">View Details</a>
                 
                 <a href="details.php?pro_id={$pro_id}" class="btn btn-primary">
                     
                     <i class="fa fa-shopping-cart"></i>
                         &nbsp; Add To Cart
                     
                 </a>
                 
             </p>
             
        </div><!-- text Finish -->
 
    </div><!-- product Finish -->
     
</div><!-- col-md-4 col-sm-6 center-responsive Finish -->


DELIMETER;

echo $products;


		}


	}


}


function getProductDetailsLike() {
	global $conn;

    $get_products = "SELECT * FROM tbl_products ORDER BY rand() DESC LIMIT 0, 3";

    $run_products = mysqli_query($conn, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

      $pro_id = $row_products['product_id'];
      $pro_title = $row_products['product_title'];
      $pro_img_1 = $row_products['product_img_1'];
      $pro_price = $row_products['product_price'];


$product_details_like = <<<DELIMETER

 <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
   <div class="product same-height"><!-- product same-height Begin -->
       <a href="details.php?pro_id={$pro_id}">
           <img class="img-responsive" src="admin/images/product/{$pro_img_1}" alt="Product 6">
        </a>
        
        <div class="text"><!-- text Begin -->
            <h3><a href="details.php?pro_id={$pro_id}">{$pro_title}</a></h3>
            
            <p class="price">&#36;{$pro_price}</p>
            
        </div><!-- text Finish -->

        <p class="button">
       
         <a href="details.php?pro_id={$pro_id}" class="btn btn-default">View Details</a>
         
         <a href="details.php?pro_id={$pro_id}" class="btn btn-primary">
             
             <i class="fa fa-shopping-cart"></i>
                 &nbsp;Add To Cart
             
         </a>
       
      </p>
        
    </div><!-- product same-height Finish -->
</div><!-- col-md-3 col-sm-6 center-responsive Finish -->



DELIMETER;

echo $product_details_like; 


    }  

}



// Function to get the Real User IP address...
function getRealUserIp(){
    switch(true){

      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];

    }

 }


function addCart() {
	global $conn;

	if(isset($_GET['add_cart'])){

		$ip_address = getRealUserIp();

		$pro_id = $_GET['add_cart'];

		$pro_qty = $_POST['qty'];

		$pro_size = $_POST['size'];


		$check_cart = "SELECT * FROM tbl_cart WHERE ip_address='$ip_address' AND p_id='$pro_id'";

		$run_cart = mysqli_query($conn, $check_cart);

		if(mysqli_num_rows($run_cart)>0){

		echo "<script>alert('This Product is already added in cart')</script>";

		echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";

		}
		else {

		$sql_cart = "INSERT INTO tbl_cart (p_id, ip_address, qty, size) VALUES ('$pro_id','$ip_address','$pro_qty','$pro_size')";

		$run_sql_cart = mysqli_query($conn, $sql_cart );

		echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";

		}

	}



}


function addItemToCart() {
	global $conn;

	$ip_address = getRealUserIp();

	$get_carts = "SELECT * FROM tbl_cart WHERE ip_address = '$ip_address'";
	$run_carts = mysqli_query($conn, $get_carts);

	$count_carts = mysqli_num_rows($run_carts);

	echo $count_carts;

}


function totalItemPrice() {
	global $conn;

	$ip_address = getRealUserIp();

	$total = 0;

	$get_carts = "SELECT * FROM tbl_cart WHERE ip_address = '$ip_address'";
	$run_carts = mysqli_query($conn, $get_carts);

	while ($row_carts = mysqli_fetch_array($run_carts)) {
		$pro_id = $row_carts['p_id'];
		$pro_qty = $row_carts['qty'];

		$get_product_price = "SELECT * FROM tbl_products WHERE product_id = '$pro_id'";
		$run_product_price = mysqli_query($conn, $get_product_price);

	while ($row_product_price = mysqli_fetch_array($run_product_price)) {
			$sub_total = $row_product_price['product_price'] * $pro_qty;

			$total += $sub_total;

		}

	}

	echo $total;


}


function updateCart() {
	global $conn;

	if(isset($_POST['update'])) {

		foreach ($_POST['remove'] as $remove_id) {
			
			$delete_cart = "DELETE FROM tbl_cart WHERE p_id = '$remove_id'";

			$run_cart = mysqli_query($conn, $delete_cart);

			if($run_cart) {
				echo "<script>alert('Product has been delected in your Cart')</script>";
				echo "<script>window.open('cart.php', '_self')</script>";
			}
		}
	}

}



function contactUs() {
	if(isset($_POST['submit'])) {
		// Admin receives email through this code...
		$sender_name = $_POST['name'];
		$sender_email = $_POST['email'];
		$sender_subject = $_POST['subject'];
		$sender_message = $_POST['message'];

		$reciver_email = "sonjoy.john@hotmail.com";

		mail($reciver_email, $sender_name, $sender_subject, $sender_message,  $sender_email);

		// Send email to sender through this code...
		$email = $_POST['email'];
		$subject = "Welcome To Our Online Shopping Website";
		$message = "We shall get you soon, thanks for sending us email";
		$from = "sonjoy.john@hotmail.com";

		mail($email, $subject, $message, $from);


		echo "<h3 align='center' class='alert alert-success'>Your message has been sent successfully done.</h3>";

	}


}

function customerLogin() {
	global $conn;

	$data = $_POST;
	if(isset($data['login'])) {
		$customer_email = $data['c_email'];
		$customer_pass = md5($data['c_pass']);

		$get_customer_login = "SELECT * FROM tbl_customers WHERE customer_email = '$customer_email' AND customer_pass = '$customer_pass'";
		$run_customer_login = mysqli_query($conn, $get_customer_login);
		$check_customer = mysqli_num_rows($run_customer_login);

		$ip_address = getRealUserIp();
		$get_cart_ip_address = "SELECT * FROM tbl_cart WHERE ip_address = '$ip_address'";
		$run_cart = mysqli_query($conn, $get_cart_ip_address);
		$check_cart = mysqli_num_rows($run_cart );

		if($check_customer == 0) {
			echo "<script>alert('Email or Password are Invalid *')</script>";
			exit();

		}
		if($check_customer == 1 && $check_cart == 0) {
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('You are Logged In...')</script>";
			echo "<script>window.open('customer-profile/my_account.php?my_orders', '_self')</script>";

		} else {
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('You are Logged In...')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";

		}

	}

}


function customerSidebar() {
	global $conn;

	$customer_session = $_SESSION['customer_email'];

	$get_customer = "SELECT * FROM tbl_customers WHERE customer_email = '$customer_session'";
	$run_customer = mysqli_query($conn, $get_customer);

	$row_customer = mysqli_fetch_array($run_customer);

	$customer_name = $row_customer['customer_name'];
	$customer_image = $row_customer['customer_image'];

	if(!isset($_SESSION['customer_email'])) {

	} else {
$customer_profile = <<<DELIMETER

<div class="panel-heading"><!--  panel-heading  Begin  -->
    
    <center><!--  center  Begin  -->
        
        <img src="./uploads/images/{$customer_image}" alt="Customer Image" style="width: 220px; height: 220px;">
        
    </center><!--  center  Finish  -->
    
    <br/>
    
    <h3 align="center" class="panel-title"><!--  panel-title  Begin  -->
        
        Name: {$customer_name}
        
    </h3><!--  panel-title  Finish -->
    
</div><!--  panel-heading Finish  -->


DELIMETER;

echo $customer_profile;

	}

}



function customerOrderList() {
	global $conn;

	$customer_session = $_SESSION['customer_email'];

	$get_customer = "SELECT * FROM tbl_customers WHERE customer_email = '$customer_session'";
	$run_customer = mysqli_query($conn, $get_customer);

	$row_customer = mysqli_fetch_array($run_customer);

	$customer_id = $row_customer['customer_id'];

	$get_orders = "SELECT * FROM tbl_customer_orders WHERE customer_id = '$customer_id'";
	$run_orders = mysqli_query($conn, $get_orders);

	$sl_no = 0;

	while ($row_order = mysqli_fetch_array($run_orders)) {
		$order_id = $row_order['order_id'];
		$due_amount = $row_order['due_amount'];
		$invoice_no = $row_order['invoice_no'];
		$qty = $row_order['qty'];
		$size = $row_order['size'];
		$order_date = substr($row_order['order_date'], 0, 11);
		$order_status = $row_order['order_status'];
		$sl_no++;

		if($order_status == "pending") {
			$order_status = "Unpaid";

		} else {
			$order_status = "Paid";

		}

		echo "	<tr>		    
		    
				    <th>{$sl_no}</th>

				    <td>&#2547;&nbsp;{$due_amount}</td>
				    <td>{$invoice_no}</td>
				    <td>{$qty}</td>
				    <td>{$size}</td>
				    <td>{$order_date}</td>
				    <td>{$order_status}</td>
				    
				    <td>
				        
				   		<a href='confirm.php?order_id={$order_id}' target='_blank' class='btn btn-primary btn-sm'> Confirm If Paid </a>
				        
				    </td>
			    
				</tr>
			";
	}


}


function confirmPayementOrder() {
	global $conn;

	if(isset($_POST['confirm_payment'])) {
		$update_id = $_GET['update_id'];
		$invoice_no = $_POST['invoice_no'];
		$amount_sent = $_POST['amount_sent']; 
		$payment_mode = $_POST['payment_mode']; 
		$reference_no = $_POST['reference_no']; 
		$code = $_POST['code'];

		$complete = "Completed";

		$get_payments = "INSERT INTO `tbl_payments`(`invoice_no`, `amount`, `payment_mode`, `reference_no`, `code`) VALUES ('$invoice_no', '$amount_sent', '$payment_mode', '$reference_no ', '$code')";
		$run_payment = mysqli_query($conn, $get_payments);

		$update_customer_orders = "UPDATE `tbl_customer_orders` SET `order_status`='$complete' WHERE order_id = '$update_id'";
		$run_update_customer_orders = mysqli_query($conn, $update_customer_orders);

		$update_pending_orders = "UPDATE `tbl_pending_orders` SET `order_status`='$complete' WHERE order_id = '$update_id'";
		$run_update_pending_orders = mysqli_query($conn, $update_pending_orders);

		if($run_update_pending_orders) {
			echo "<script>alert('Your payment has been received, please wait until order will be completed within 24 hours')</script>";
			echo "<script>window.open('my_account.php?my_orders', '_self')</script>";

		}

	}

}


function updatePassword() {
	global $conn;

	if(isset($_POST['update_Pass'])) {
	$customer_email = $_SESSION['customer_email'];

	$old_pass = md5($_POST['old_pass']);
	$new_pass = md5($_POST['new_pass']);
	$confirm_pass = md5($_POST['confirm_pass']);

	$get_old_pass = "SELECT * FROM tbl_customers WHERE customer_pass = '$old_pass'";
	$run_old_pass = mysqli_query($conn, $get_old_pass);

	$check_old_pass = mysqli_num_rows($run_old_pass);

		if($check_old_pass == 0) {
			echo "<script>alert('Your current password is not valid please, try again *')</script>";
			echo "<script>window.open('my_account.php?change_pass', '_self')</script>";

		} 

		if($new_pass != $confirm_pass) {
			echo "<script>alert('Password does not matched *')</script>";
			echo "<script>window.open('my_account.php?change_pass', '_self')</script>";
		}

		$update_pass = "UPDATE `tbl_customers` SET `customer_pass`='$new_pass' WHERE customer_email = '$customer_email'";
		$run_update_pass = mysqli_query($conn, $update_pass);

		if($run_update_pass) {
			echo "<script>alert('Password has been changed successfully done.')</script>";
			echo "<script>window.open('my_account.php?my_orders', '_self')</script>";

		}


	}


}








