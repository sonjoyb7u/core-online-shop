
<?php include_once("includes/head.php"); ?>
    
<?php

  $data = $_POST;
  $file = $_FILES;
  if(isset($data['register'])) {
    $customer_name = $data['c_name'];
    $customer_email = $data['c_email'];
    $customer_pass = md5($data['c_pass']);
    $customer_country = $data['c_country'];
    $customer_city = $data['c_city'];
    $customer_contact = $data['c_contact'];
    $customer_address = $data['c_address'];

    $customer_img_name = $file['c_image']['name'];
    $customer_img_name1 = explode('.', $customer_img_name);
    $customer_img_ext = end($customer_img_name1);
    $new_customer_img_name = rand(0, 1000)."."."$customer_name".".".$customer_img_ext;

    $customer_img_tmp = $file['c_image']['tmp_name'];

    $customer_ipaddress = getRealUserIp();


    move_uploaded_file($customer_img_tmp, "customer-profile/uploads/images/$new_customer_img_name");    

      $get_customer_register = "INSERT INTO `tbl_customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$customer_name', '$customer_email', '$customer_pass', '$customer_country', '$customer_city', '$customer_contact', '$customer_address', '$new_customer_img_name', '$customer_ipaddress')";
      $run_customer_register = mysqli_query($conn, $get_customer_register);


    $get_carts = "SELECT * FROM tbl_cart WHERE ip_address = '$customer_ipaddress'";
    $run_carts = mysqli_query($conn, $get_carts);

    $check_cart = mysqli_num_rows($run_carts);

    if($check_cart > 0) {
      $_SESSION['customer_email'] = $customer_email;

      echo "<script>alert('Your have been registered successfully.')</script>";
      echo "<script>window.open('checkout.php', '_self')</script>";

    } else {
      $_SESSION['customer_email'] = $customer_email;

      echo "<script>alert('You are registered, please login.')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }


  }

?>
    
<?php include_once("includes/header.php"); ?>
  
  <div id="content"><!-- #content Begin -->
  <div class="container"><!-- container Begin -->
  <div class="col-md-12"><!-- col-md-12 Begin -->
  
  <ul class="breadcrumb"><!-- breadcrumb Begin -->
  <li>
    <a href="index.php">Home</a>
  </li>
  <li>
    Register
  </li>
  </ul><!-- breadcrumb Finish -->
  
  </div><!-- col-md-12 Finish -->
  
  <div class="col-md-3"><!-- col-md-3 Begin -->
  
  <?php
  include_once ('includes/sidebar.php');
  ?>
  
  </div><!-- col-md-3 Finish -->
  
  <div class="col-md-9"><!-- col-md-9 Begin -->
  
  <div class="box"><!-- box Begin -->
  
  <div class="box-header"><!-- box-header Begin -->
  
  <center><!-- center Begin -->
  
  <h2> Register a new account </h2>
  
  </center><!-- center Finish -->

  <form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_name">Your Name</label>
  
  <input type="text" id="c_name" class="form-control" name="c_name" value="" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_email">Your Email</label>
  
  <input type="text" id="c_email" class="form-control" name="c_email" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_pass">Your Password</label>
  
  <input type="password" id="c_pass" class="form-control" name="c_pass" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_country">Your Country</label>
  
  <input type="text" id="c_country" class="form-control" name="c_country" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_city">Your City</label>
  
  <input type="text" id="c_city" class="form-control" name="c_city" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_contact">Your Contact</label>
  
  <input type="text" id="c_contact" class="form-control" name="c_contact" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_address">Your Address</label>
  
  <input type="text" id="c_address" class="form-control" name="c_address" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="form-group"><!-- form-group Begin -->
  
  <label for="c_image">Your Profile Picture</label>
  
  <input type="file" id="c_image" class="form-control form-height-custom" name="c_image" required="">
  
  </div><!-- form-group Finish -->
  
  <div class="text-center" style="margin-top: 40px;"><!-- text-center Begin -->
  
  <button type="submit" name="register" class="btn btn-primary">
  
  <i class="fa fa-user-md"></i>&nbsp;&nbsp;Register
  
  </button>
  
  </div><!-- text-center Finish -->
  
  </form><!-- form Finish -->
  
  </div><!-- box-header Finish -->
  
  </div><!-- box Finish -->
  
  </div><!-- col-md-9 Finish -->
  
  </div><!-- container Finish -->
  </div><!-- #content Finish -->
  
  <?php
  
  include_once ("includes/footer.php");
  
  ?>
  
<?php include_once ("includes/scripts.php"); ?>

