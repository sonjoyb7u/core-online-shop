
<!-- header Top Start -->
<div id="header-top">
	<div class="container">
		<div class="col-md-6 order-cart">
			<a href="index.php" class="btn btn-primary btn-sm">
				<?php 
					if(!isset($_SESSION['customer_email'])) {
						echo "Welcome : Guest";

					} else {
						echo "Welcome :" . "&nbsp;&nbsp;" . strtoupper($_SESSION['customer_email']);
					}
				?>
			</a>&nbsp;&nbsp;
			<a href="checkout.php" class="checkout-cart">
				<?php
					addItemToCart();
				?>
				Items In Your Cart | Total Price: 
				&#2547; <?php 
						totalItemPrice();
				 	 ?>
			</a>
		</div>
		<div class="col-md-6">
			<ul class="top-menu">
				<li>
					<a href="./customer_register.php">
						Register
					</a>
				</li>
				<li>
					<?php

						if(!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'>My Account</a>";
						} else {
							echo "<a href='customer-profile/my_account.php?my_orders'>My Account</a>";
						}

					?>
				</li>
				<li><a href="checkout.php">Check Out</a></li>
				<li>
					<a href="cart.php">
						Cart&nbsp;<i class="fa fa-shopping-cart"></i>
						<span class="badge">
							<?php
								addItemToCart();
							?>
						</span>
					</a>
				</li>
				<li>
					<?php

						if(!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'>Login</a>";
						} else {
							echo "<a href='logout.php'>Logout</a>";
						}

					?>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- Navbar Section Start -->
<div id="navbar" class="navbar navbar-default">
<div class="container">
	<div class="navbar-header">
		<a href="index.php" class="navbar-brand home">
			<img src="images/logo/logo-3.png" alt="Logo-Png-1" class="hidden-xs">
			<img src="images/logo/logo-4.png" alt="Logo-Png-2" class="visible-xs">
		</a>
		<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
		<span class="sr-only">Toggle Navigation</span>
		<i class="fa fa-align-justify"></i>
		</button>
	</div>
	<div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
	
	<div class="padding-nav">

		<?php 
			$active = 'active';
			$current_page = basename($_SERVER['PHP_SELF'], ".php");
			if($current_page == 'index') {
				$index = $active;
			}
			if($current_page == 'shop') {
				$shop = $active;
			}
			if($current_page == 'service') {
				$service = $active;
			}
			if($current_page == 'blog') {
				$blog = $active;
			}
			if($current_page == 'about_us') {
				$about_us = $active;
			}
			if($current_page == 'contact') {
				$contact = $active;
			}
		?>
		
		<ul class="nav navbar-nav left">
			
			<li class="<?= $index; ?>">
				<a href="index.php">Home</a>
			</li>
			<li class="<?= $shop; ?>">
				<a href="shop.php">Shop</a>
			</li>
			<li class="<?= $about_us; ?>">
				<a href="about_us.php">About Us</a>
			</li>
			<li class="<?= $service; ?>">
				<a href="service.php">Our Service</a>
			</li>
			<li class="<?= $blog; ?>">
				<a href="blog.php">Our Blog</a>
			</li>
			<li class="<?= $contact; ?>">
				<a href="contact.php">Contact Us</a>
			</li>
			
		</ul>
		
	</div>
	
<!-- 	<a href="cart.php" class="btn navbar-btn btn-primary right">
		
		<i class="fa fa-shopping-cart"></i>&nbsp;
		
		<span>
			Cart: 
			<?php
				addItemToCart();
			?> 
			Items
		</span> -->
		
	</a>
	
	<div class="clearfix">
		
		<form method="get" action="results.php" class="navbar-form">
			
			<div class="input-group search-box-item">
				
				<input type="text" class="form-control" placeholder="Search" name="search_item" required>
				
				<span class="input-group-btn">
					
					<button type="submit" name="search" value="Search" class="btn btn-primary">
					
					<i class="fa fa-search"></i>
					
					</button>
					
				</span>
				
			</div>
			
		</form>
		
	</div>
	
	</div><!-- navbar-collapse collapse Finish -->
</div>
</div>
<!-- Navbar Section End -->
<!-- Header Top End -->