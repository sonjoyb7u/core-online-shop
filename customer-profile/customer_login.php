<div class="col-md-1"></div>
<div class="col-md-8">
	<div class="box"><!-- box Begin -->
		<div class="box-header"><!-- box-header Begin -->
			<center style="margin-bottom: 30px;"><!-- center Begin -->
				<h2>LOGIN</h2>
				<p class="lead">
					Already Our Customer ?
				</p>
				<p class="text-muted"><!-- text-muted Begin -->
				If you are our registered customer please,&nbsp;&nbsp;<strong>Login Here</strong>
				</p><!-- text-muted Finish -->
			</center><!-- center Finish -->
		</div><!-- box-header Finish -->

		<?php

			customerLogin();

		?>	
			<form action="" method="post"><!-- form Begin -->
				<div class="form-group"><!-- form-group Begin -->
					<label for="c_email">Username/Email Address :</label>
					<input type="email" id="c_email" class="form-control" name="c_email" required>
				</div><!-- form-group Finish -->
				<div class="form-group"><!-- form-group Begin -->
					<label for="c_pass">Password :</label>
					<input type="password" id="c_pass" class="form-control" name="c_pass" required>
				</div><!-- form-group Finish -->
				<div class="text-center" style="margin-top: 25px;"><!-- text-center Begin -->
					<button type="submit" name="login" class="btn btn-primary" >
						<i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login
						
					</button>
				</div><!-- text-center Finish -->
			</form><!-- form Finish -->
			<hr>
			<div class="text-center">
				If you are registration ? please, 
				<a href="./customer_register.php" class="btn btn-primary btn-xs">Signup</a>
			</div>	
	</div><!-- box Finish -->
</div>

