<?php include_once("includes/head.php"); ?>

<?php

if(!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php', '_self')</script>";

} else {

?>

<?php

  if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

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
                       My Account
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/myaccount_sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <h1 align="center"> Please confirm your payment</h1>

                   <?php

                      confirmPayementOrder();

                   ?>
                   
                   <form action="confirm.php?update_id=<?= $order_id; ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label for="invoice_no"> Invoice No: </label>
                          
                          <input type="text" id="invoice_no" class="form-control" name="invoice_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label for="amount_sent"> Amount Sent: </label>
                          
                          <input type="text" id="amount_sent" class="form-control" name="amount_sent" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label for="payment_mode"> Select Payment Mode: </label>
                          
                          <select name="payment_mode" id="payment_mode" class="form-control"><!-- form-control Begin -->
                              
                              <option> Select Payment Mode </option>
                              <option> Banking </option>
                              <option> Cash On Delivery </option>
                              <option> Brac-bkash </option>
                              <option> DBBL-Rocket </option>
                              <option> UCB-Ucash </option>
                              
                          </select><!-- form-control Finish -->
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label for="reference_no"> Transaction / Reference ID: </label>
                          
                          <input type="text" id="reference_no" class="form-control" name="reference_no" placeholder="If required">
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label for="bank_acc_no">Transaction Code: </label>
                          
                          <input type="text" id="bank_acc_no" class="form-control" name="code" placeholder="If payment mode - Banking, than enter Bank cheque no. or Bank trans. no.">
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="text-center"><!-- text-center Begin -->
                           
                           <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg"><!-- tn btn-primary btn-lg Begin -->
                               
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button><!-- tn btn-primary btn-lg Finish -->
                           
                       </div><!-- text-center Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->


   
   
<?php include_once ("includes/footer.php"); ?>
    

<?php include_once ("includes/scripts.php"); ?>


<?php } ?>