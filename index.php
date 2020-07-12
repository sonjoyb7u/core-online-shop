<?php include_once ("includes/head.php"); ?> 

<?php include_once ("includes/header.php"); ?>  
 
<?php include_once ("includes/slider.php"); ?> 

<?php include_once ("includes/service.php"); ?>

 
<!-- Products Section Start -->
<div id="hot"><!-- #hot Begin -->
<div class="box">
  
  <div class="container">
    
    <div class="col-md-12">
      
      <h2>
      <strong>Our Latest Products</strong>
      </h2>
      
    </div>
    
  </div>
  
</div>
</div><!-- #hot Finish -->
<div id="content" class="container"><!-- container Begin -->
<div class="row"><!-- row Begin -->

<?php getProducts(); ?>

</div><!-- row Finish -->
</div><!-- container Finish -->
<!-- Products Section End -->

<?php include_once ("includes/footer.php"); ?>


<?php include_once ("includes/scripts.php"); ?>