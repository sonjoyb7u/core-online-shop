<?php

$get_slider = "SELECT * FROM tbl_slider WHERE is_active = '1'";
$run_sliders = mysqli_query($conn, $get_slider);

?>

<!-- Slider Section Start -->
<div class="container" id="slider"><!-- container Begin -->

<div class="col-md-12">
	
	<div class="carousel slide" id="myCarousel" data-ride="carousel">
		
		<ol class="carousel-indicators">
			
<?php
	$i = 0;
	foreach ($run_sliders as $run_slider_row) {
		$actives = '';
		if($i == 0) {
			$actives = 'active';
		}				
?>

			<li class="<?= $actives; ?>" data-target="#myCarousel" data-slide-to="<?= $i; ?>"></li>

<?php $i++; } ?>

		</ol>
		
		<div class="carousel-inner slider-image">

<?php
	$i = 0;
	foreach ($run_sliders as $run_slider_row) {
		$slider_image = $run_slider_row['slider_image'];
		$slider_title = $run_slider_row['slider_title'];
		$slider_description = $run_slider_row['slider_description'];
		$actives = '';
		if($i == 0) {
			$actives = 'active';
		}				
?>

			<div class="item <?= $actives; ?> slider-image">
				<div class="slide-image">
					<img src="images/slider/<?= $slider_image; ?>" alt="Slider Image 1">
					<div class="slide-overlay"></div>
				</div>
				<div class="slider-text">
					<h2><?= $slider_title; ?></h2>
					<p><?= $slider_description; ?></p>
					<a href="#" class="btn btn-primary btn-lg slide-btn">Shop Now</a>
				</div>
			</div>

<?php $i++; } ?>
           <div id="particles-slider"></div>
			
		</div>
		
		<a href="#myCarousel" class="left carousel-control" data-slide="prev">
			
			<i class="fa fa-chevron-left slider-left"></i>
			<span class="sr-only">Previous</span>
			
		</a>
		
		<a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
		
		<i class="fa fa-chevron-right slider-right"></i>
		<span class="sr-only">Next</span>
		
	    </a>
	
</div>

</div>
</div><!-- container Finish -->
<!-- Slider Section End