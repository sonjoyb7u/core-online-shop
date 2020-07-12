<?php include_once ("includes/head.php"); ?>

<?php

    if(isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];

    $get_product = "SELECT * FROM tbl_products WHERE product_id = '$pro_id'";
    $run_product = mysqli_query($conn, $get_product);

    $row_product = mysqli_fetch_array($run_product);

    $pro_cats_id = $row_product['p_cat_id'];
    $pro_title = $row_product['product_title'];
    $pro_img_1 = $row_product['product_img_1'];
    $pro_img_2 = $row_product['product_img_2'];
    $pro_img_3 = $row_product['product_img_3'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_description'];

    $get_pro_cats = "SELECT * FROM tbl_product_categories WHERE p_cat_id = '$pro_cats_id'";
    $run_pro_cats = mysqli_query($conn, $get_pro_cats);

    $row_pro_cats = mysqli_fetch_array($run_pro_cats);

    // $pro_cats_id = $row_pro_cats['p_cat_id'];
    $pro_cats_title = $row_pro_cats['p_cat_title'];
    $pro_cats_desc = $row_pro_cats['p_cat_description'];


  }

?>
   
<?php include_once ("includes/header.php"); ?> 

   
<div id="content"><!-- #content Begin -->
   <div class="container"><!-- container Begin -->
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <ul class="breadcrumb"><!-- breadcrumb Begin -->
               <li>
                   <a href="index.php">Home</a>
               </li>
               <li>
                   <a href="shop.php">Shop</a>
               </li>
               <li>
                   <a href="shop.php?pro_cats_id=<?= $pro_cats_id; ?>"><?= $pro_cats_title; ?></a>
               </li>
               <li>
                   <?= $pro_title; ?>
               </li>
           </ul><!-- breadcrumb Finish -->
           
       </div><!-- col-md-12 Finish -->

       <div class="col-md-3"><!-- col-md-3 Begin -->

<?php 

include_once ('includes/sidebar.php');

?>

     </div><!-- col-md-3 Finish -->
       
       <div class="col-md-9"><!-- col-md-9 Begin -->
           <div id="productMain" class="row"><!-- row Begin -->
               <div class="col-sm-6"><!-- col-sm-6 Begin -->
                   <div id="mainImage"><!-- #mainImage Begin -->
                       <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                           <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                               <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                               <li data-target="#myCarousel" data-slide-to="1"></li>
                               <li data-target="#myCarousel" data-slide-to="2"></li>
                           </ol><!-- carousel-indicators Finish -->
                           
                           <div class="carousel-inner">
                               <div class="item active">
                                   <center><img class="img-responsive" src="admin/images/product/<?= $pro_img_1; ?>" alt="Product 3"></center>
                               </div>
                               <div class="item">
                                   <center><img class="img-responsive" src="admin/images/product/<?= $pro_img_2; ?>" alt="Product 3"></center>
                               </div>
                               <div class="item">
                                   <center><img class="img-responsive" src="admin/images/product/<?= $pro_img_3; ?>" alt="Product 3"></center>
                               </div>
                           </div>
                           
                           <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                               <i class="fa fa-chevron-left details-slider-left"></i>
                               <span class="sr-only">Previous</span>
                           </a><!-- left carousel-control Finish -->
                           
                           <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                               <i class="fa fa-chevron-right details-slider-right"></i>
                               <span class="sr-only">Previous</span>
                           </a><!-- right carousel-control Finish -->
                           
                       </div><!-- carousel slide Finish -->
                   </div><!-- mainImage Finish -->
               </div><!-- col-sm-6 Finish -->
                 
               <div class="col-sm-6"><!-- col-sm-6 Begin -->
                   <div class="box"><!-- box Begin -->
                       <h1 class="text-center"><?= $pro_title; ?></h1>

<?php 

  addCart();

?>                       
                       <form action="details.php?add_cart=<?= $pro_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                           <div class="form-group"><!-- form-group Begin -->
                               <label for="" class="col-md-5 control-label">Products Quantity</label>
                               
                               <div class="col-md-7"><!-- col-md-7 Begin -->
                                      <select name="qty" id="" class="form-control"><!-- select Begin -->
                                         <option>Select a Quantity</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                       </select><!-- select Finish -->
                               
                                </div><!-- col-md-7 Finish -->
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               <label class="col-md-5 control-label">Product Size</label>
                               
                               <div class="col-md-7"><!-- col-md-7 Begin -->
                                   
                                   <select name="size" class="form-control"><!-- form-control Begin -->
                                      
                                       <option>Select a Size</option>
                                       <option>Small</option>
                                       <option>Medium</option>
                                       <option>Large</option>
                                       
                                   </select><!-- form-control Finish -->
                                   
                               </div><!-- col-md-7 Finish -->
                           </div><!-- form-group Finish -->
                           
                           <p class="price">Total Price: &#36;<?= $pro_price; ?></p>
                           
                           <p class="text-center buttons">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>&nbsp;Add To Cart
                              </button>
                           </p>
                           
                       </form><!-- form-horizontal Finish -->
                       
                   </div><!-- box Finish -->
                   
                   <div class="row" id="thumbs"><!-- row Begin -->
                       
                       <div class="col-xs-4"><!-- col-xs-4 Begin -->
                           <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!-- thumb Begin -->
                               <img src="admin/images/product/<?= $pro_img_1; ?>" alt="product 1" class="img-responsive">
                           </a><!-- thumb Finish -->
                       </div><!-- col-xs-4 Finish -->
                       
                       <div class="col-xs-4"><!-- col-xs-4 Begin -->
                           <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!-- thumb Begin -->
                               <img src="admin/images/product/<?= $pro_img_2; ?>" alt="product 2" class="img-responsive">
                           </a><!-- thumb Finish -->
                       </div><!-- col-xs-4 Finish -->
                       
                       <div class="col-xs-4"><!-- col-xs-4 Begin -->
                           <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!-- thumb Begin -->
                               <img src="admin/images/product/<?= $pro_img_3; ?>" alt="product 4" class="img-responsive">
                           </a><!-- thumb Finish -->
                       </div><!-- col-xs-4 Finish -->
                       
                   </div><!-- row Finish -->
                   
               </div><!-- col-sm-6 Finish -->
               
               
           </div><!-- row Finish -->
           
           <div class="box" id="details"><!-- box Begin -->
                   
                   <h4>Product Details</h4>
               
               <p>
                   
                   <?= $pro_desc; ?>
                   
               </p>
               
                   <h4>Size</h4>
                   
                   <ul class="box-size">
                       <li>Small</li>
                       <li>Medium</li>
                       <li>Large</li>
                   </ul>  
                   
                   <hr>
               
           </div><!-- box Finish -->
        
           <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
               <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                   <div class="box same-height headline"><!-- box same-height headline Begin -->
                       <h3 class="text-center">Products You Maybe Like</h3>
                   </div><!-- box same-height headline Finish -->
               </div><!-- col-md-3 col-sm-6 Finish -->

<?php

  getProductDetailsLike();

?>   
                                           
           </div><!-- #row same-heigh-row Finish -->
           
       </div><!-- col-md-9 Finish -->
       
    </div><!-- container Finish -->
</div><!-- #content Finish -->


   
<?php include_once ("includes/footer.php"); ?>


<?php include_once ("includes/scripts.php"); ?>