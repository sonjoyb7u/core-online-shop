<?php include_once ("includes/head.php"); ?>
    

<?php include_once ("includes/header.php"); ?> 
   
 <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
<?php 

include_once ('includes/sidebar.php');

?>
               
        </div><!-- col-md-3 Finish -->
       
         <div class="col-md-9"><!-- col-md-9 Begin -->
            
<?php
    if(!isset($_GET['pro_cats_id'])) :
        if(!isset($_GET['cats_id'])) :

?>

             <div class="box"><!-- box Begin -->
                 <h1>Shop</h1>
                 <p>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                 </p>
             </div><!-- box Finish -->

 <?php
        endif;
    endif;
 ?>
             
             <div class="row"><!-- row Begin -->

<?php

if(!isset($_GET['pro_cats_id'])) {

    if(!isset($_GET['cats_id'])) {
            $per_page = 6;

        if(isset($_GET['page'])) {
            $page = $_GET['page'];

        } else {
            $page = 1;

          }


    $start_from = ($page-1) * $per_page;

    $get_products = "SELECT * FROM tbl_products ORDER BY 1 DESC LIMIT $start_from, $per_page";

    $run_products = mysqli_query($conn, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

    $pro_id = $row_products['product_id'];
    $pro_title = $row_products['product_title'];
    $pro_img_1 = $row_products['product_img_1'];
    $pro_price = $row_products['product_price'];

?>

                <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsive Begin -->
     
                    <div class="product"><!-- product Begin -->
                 
                         <a href="details.php?pro_id=<?= $pro_id; ?>">
                             
                             <img class="img-responsive" src="admin/images/product/<?= $pro_img_1; ?>" alt="Product 1">
                             
                         </a>
                 
                        <div class="text"><!-- text Begin -->
                             
                             <h3>
                                 <a href="details.php?pro_id=<?= $pro_id; ?>">
                                     <?= $pro_title; ?>
                                 </a>
                             </h3>
                             
                             <p class="price">&#36;<?= $pro_price; ?></p>
                             
                             <p class="button">
                                 
                                 <a href="details.php?pro_id=<?= $pro_id; ?>" class="btn btn-default">View Details</a>
                                 
                                 <a href="details.php?pro_id=<?= $pro_id; ?>" class="btn btn-primary">
                                     
                                     <i class="fa fa-shopping-cart"></i>
                                         &nbsp; Add To Cart
                                     
                                 </a>
                                 
                             </p>
                             
                        </div><!-- text Finish -->
                 
                    </div><!-- product Finish -->
                     
                </div><!-- col-md-4 col-sm-6 center-responsive Finish -->
 <?php } ?>

              </div><!-- row Finish -->   
                 
             <center>
                 <ul class="pagination">

<?php

    $get_query = "SELECT * FROM tbl_products";

    $result = mysqli_query($conn, $get_query);

    $total_rows = mysqli_num_rows($result);

    $total_pages = ceil($total_rows / $per_page);
?>

                     <li class="active;"><a href="shop.php?page=<?= $page; ?>">First Page</a></li>

<?php

   for($page=1; $page<=$total_pages; $page++) {

?>

                     <li>
                        <a href="shop.php?page=<?= $page; ?>">
                            <?= $page; ?>                           
                        </a>
                    </li>

<?php   
    }
 ?>

                     <li>
                        <a href="shop.php?page=<?= $total_pages; ?>">
                            Last Page
                        </a>
                    </li>

<?php

            }


        }   

?>

                 </ul>
            </center>

                
<?php 

    getProCatsClick();

?>


<?php 

    getCatsClick();
    
?>

             
         </div><!-- col-md-9 Finish -->
         
     </div><!-- container Finish -->
  </div><!-- #content Finish -->

  
   
<?php include_once ("includes/footer.php"); ?>


<?php include_once ("includes/scripts.php"); ?>