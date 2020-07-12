<?php include_once("includes/head.php"); ?>

<?php

if(!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php', '_self')</script>";

} else {

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
                   
                   <?php
                   
                     if (isset($_GET['my_orders'])){
                         include_once ("my_orders.php");
                     }
                   
                   ?>


                  <?php
                   
                     if (isset($_GET['pay_offline'])){
                         include_once ("pay_offline.php");
                     }
                   
                   ?>


                  <?php
                   
                     if (isset($_GET['edit_account'])){
                         include_once ("edit_account.php");
                     }
                   
                   ?>


                   <?php
                   
                     if (isset($_GET['change_pass'])){
                         include_once ("change_password.php");
                     }
                   
                   ?>


                   <?php
                   
                     if (isset($_GET['delete_account'])){
                         include_once ("delete_account.php");
                     }
                   
                   ?>
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
<?php include_once ("includes/footer.php"); ?>
    

<?php include_once ("includes/scripts.php"); ?>


<?php } ?>