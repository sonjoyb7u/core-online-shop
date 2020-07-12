<?php
require_once ("./../functions/functions.php");
	updatePassword();

?>


<h2 align="center">Change Your Password</h2>

<form action="" method="post">
	<div class="form-group">
		<label for="old_pass">Enter Your Current Password</label>
		<input type="text" id="old_pass" name="old_pass" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="new_pass">Enter Your New Password</label>
		<input type="text" id="new_pass" name="new_pass" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="confirm_pass">Enter Your Confirm Password</label>
		<input type="text" id="confirm_pass" name="confirm_pass" class="form-control" required="">
	</div>

	<div class="text-center">
		<button type="submit" class="btn btn-primary" name="update_Pass"><i class="fa fa-user"></i>&nbsp;&nbsp;Change Password</button>	
	</div>
	
</form>

