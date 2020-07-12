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
					Customer Login
				</li>
			</ul><!-- breadcrumb Finish -->
		</div><!-- col-md-12 Finish -->

	<div class="col-md-3"><!-- col-md-3 Begin -->

	<?php
	include_once ('includes/sidebar.php');
	?>

	</div><!-- col-md-3 Finish -->

	<div class="col-md-9">

		<?php

			if(!isset($_SESSION['customer_email'])) {
				include_once ("customer-profile/customer_login.php");

			} else {
				include_once ("payment_options.php");
			}

		?>

	</div>	

	</div><!-- container Finish -->
</div><!-- #content Finish -->


<?php include_once ("includes/footer.php"); ?>

<?php include_once ("includes/scripts.php"); ?>