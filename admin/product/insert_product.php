<?php include_once ("../includes/head.php"); ?>

<div class="container">
	<div class="row">
		<div class="clo-lg-12">
			<ol class="breadcrumb">
			  <li><a href="../dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
			  <li>Insert product</li>
			</ol>
		</div>
	</div>

<?php

$data = $_POST;
$file = $_FILES;

if(isset($data['insert_product'])) {

	$pro_title = $data['pro_title'];
	$pro_cat = $data['pro_cat'];
	$cat = $data['cat'];
	$pro_price = $data['pro_price'];
	$pro_desc = $data['pro_desc'];
	$pro_keywords = $data['pro_keywords'];

	$pro_img_name1 = explode('.', $file['pro_img_1']['name']);
	$pro_img_ext1 = end($pro_img_name1);
	$pro_img_name2 = explode('.', $file['pro_img_2']['name']);
	$pro_img_ext2 = end($pro_img_name2);
	$pro_img_name3 = explode('.', $file['pro_img_3']['name']);
	$pro_img_ext3 = end($pro_img_name3);
	$new_pro_img_name1 = rand(0, 1000)."."."$pro_keywords".".".$pro_img_ext1;
	$new_pro_img_name2 = rand(1001, 2000)."."."$pro_keywords".".".$pro_img_ext2;
	$new_pro_img_name3 = rand(2001, 3000)."."."$pro_keywords".".".$pro_img_ext3;

	$pro_img_tmp_name1 = $file['pro_img_1']['tmp_name'];
	$pro_img_tmp_name2 = $file['pro_img_2']['tmp_name'];
	$pro_img_tmp_name3 = $file['pro_img_3']['tmp_name'];

    $field_required = [];
    if(empty($pro_title)) {
        $field_required['pro_title'] = "This input field product title is required *";
    }
    if(empty($pro_cat)) {
        $field_required['pro_cat'] = "This input field product categories is required *";
    }
    if(empty($cat)) {
        $field_required['cat'] = "This input field categories is required *";
    }
    if(empty($pro_price)) {
        $field_required['pro_price'] = "This input field product price is required *";
    }
    if(empty($pro_desc)) {
        $field_required['pro_desc'] = "This input field product description. is required *";
    }
    if(empty($pro_keywords)) {
        $field_required['pro_keywords'] = "This input field product keywords is required *";
    }

	$insert_product = "INSERT INTO `tbl_products`(`p_cat_id`, `cat_id`, `product_title`, `product_img_1`, `product_img_2`, `product_img_3`, `product_price`, `product_description`, `product_keywords`) VALUES ('$pro_cat', '$cat', '$pro_title', '$new_pro_img_name1', '$new_pro_img_name2', '$new_pro_img_name3', '$pro_price', '$pro_desc', '$pro_keywords')";
	// print_r($insert_product);
	$run_product = mysqli_query($conn, $insert_product);
	// print_r($run_product);

    if($run_product) {
        $success_msg = "Product Information Inserted Successfully done.";
    	move_uploaded_file($pro_img_tmp_name1, "../images/product/$new_pro_img_name1");
		move_uploaded_file($pro_img_tmp_name2, "../images/product/$new_pro_img_name2");
		move_uploaded_file($pro_img_tmp_name3, "../images/product/$new_pro_img_name3");

    }else {
        $error_msg = "Something wrong here *";
    }

}

?>

<?php
    if(isset($success_msg)) {
        echo '<div class="col-sm-8 alert alert-success">' . $success_msg . '</div>';
    }
    if(isset($error_msg)) {
        echo '<div class="col-sm-8 alert alert-danger">' . $error_msg . '</div>';
    }
?>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fab fa-product-hunt"></i>
						Insert Product :
					</h3>
				</div>

				<div class="panel-body">
					<form action="insert_product.php" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label for="pro_title" class="col-md-3 control-label">Product Title :</label>
							<div class="col-md-6">
								<input type="text" id="pro_title" name="pro_title" class="form-control">
							</div>
							<label class="error_msg">
								<?php
									if(isset($field_required['pro_title'])) {
										echo $field_required['pro_title'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label for="pro_cat" class="col-md-3 control-label">Product Categories :</label>
							<div class="col-md-6">
								<select name="pro_cat" id="pro_cat" class="form-control">
									<option value="">Select a Product Categories</option>
<?php

$get_pro_cats = "SELECT * FROM tbl_product_categories";
$run_pro_cats = mysqli_query($conn, $get_pro_cats);

while ($pro_cat_rows = mysqli_fetch_array($run_pro_cats)) :
$pro_cats_id = $pro_cat_rows['p_cat_id'];
$pro_cats_title = $pro_cat_rows['p_cat_title'];	
// $pro_cat_description = $pro_cat_row['p_cat_description'];	
?>
									<option value="<?= $pro_cats_id; ?>">
										<?= $pro_cats_title; ?>
									</option>
<?php endwhile; ?>
								</select>
							</div>
							<label class="error_msg">
								<?php
									if(isset($field_required['cat'])) {
										echo $field_required['cat'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label for="cat" class="col-md-3 control-label">Category :</label>
							<div class="col-md-6">
							<select name="cat" id="cat" class="form-control">
									<option value="">Select a Categories</option>


<?php

$get_cats = "SELECT * FROM tbl_categories";
$run_cats = mysqli_query($conn, $get_cats);

while ($cats_rows = mysqli_fetch_array($run_cats)) :
$cats_id = $cats_rows['cat_id'];
$cats_title = $cats_rows['cat_title'];	
// $cat_description = $cat_rows['p_cat_description'];	
?>

									<option value="<?= $cats_id; ?>">
										<?= $cats_title; ?>
									</option>

<?php endwhile; ?>
							</select>
							</div>
							<label class="error_msg">
								<?php
									if(isset($field_required['pro_cat'])) {
										echo $field_required['pro_cat'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label for="pro_img_1" class="col-md-3 control-label">Product Image-1 :</label>
							<div class="col-md-6">
								<input type="file" id="pro_img_1" name="pro_img_1" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="pro_img_2" class="col-md-3 control-label">Product Image-2 :</label>
							<div class="col-md-6">
								<input type="file" id="pro_img_2" name="pro_img_2" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="pro_img_3" class="col-md-3 control-label">Product Image-3 :</label>
							<div class="col-md-6">
								<input type="file" id="pro_img_3" name="pro_img_3" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="pro_price" class="col-md-3 control-label">Product Price :</label>
							<div class="col-md-6">
								<input type="text" id="pro_price" name="pro_price" class="form-control">
							</div>
							<label class="error_msg">
								<?php
									if(isset($field_required['pro_price'])) {
										echo $field_required['pro_price'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label for="pro_desc" class="col-md-3 control-label">Product Description :</label>
							<div class="col-md-6">
								<textarea name="pro_desc" id="pro_desc" cols="20" rows="6" class="form-control"></textarea>
							</div>
							<label class="error_msg">
								<?php
									if(isset($field_required['pro_desc'])) {
										echo $field_required['pro_desc'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label for="pro_keywords" class="col-md-3 control-label">Product Keywords :</label>
							<div class="col-md-6">
								<input type="text" id="pro_keywords" name="pro_keywords" class="form-control">
							</div>
							<label class="error_msg">
								<?php
									if(isset($field_required['pro_keywords'])) {
										echo $field_required['pro_keywords'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" id="" name="insert_product" class="btn btn-primary form-control" value="Insert Product">
							</div>
						</div>
					</form>
				</div>				
			</div>
		</div>
	</div>
</div>








<?php include_once ("../includes/scripts.php"); ?>