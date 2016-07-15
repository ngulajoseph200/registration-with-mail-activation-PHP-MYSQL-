<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<?php include './includes/head.php'; ?>

<style>
	body{background:#F0F0F0;}
	.col-sm-4{float:none; margin: auto; background:#fff; padding:20px 34px; box-shadow: 0 0 4px 0 rgba(0,0,0,.08),0 2px 4px 0 rgba(0,0,0,.12); border-radius: 4px;}
</style>

</head>
<body>
<div class="wrapper">
	<br>
	<div class="container">
			
		<div class="col-sm-4">
		<form role="form" id="regform"  action="log.php" method="post">
			<div class="form-group modal-header">
				<h3 class="modal-title text-center"><b><span style="color:#31b0d5">Sign-Up with</span> mail activation</b></h3>
			</div>
			<div class="form-group"><h5 class="text-center"><b>Sign in</b></h5></div>
			
			<div id="inner_inputs">
			<div class="form-group">
				<i class="fa fa-user"></i>
				<input type="email" name="email" class="form-control" placeholder="Email Address" required="type" />
			</div>
			
			<div class="form-group">
				<i class="fa fa-key"></i>
				<input type="password" name="password" class="form-control" placeholder="Password" required="type" />
			</div>
			
			<div class="form-group">
				<input type="hidden" name="formsubmitted" class="btn btn-info btn-block" value="Log In" />
				<button type="submit" name="lgbtn" class="btn btn-info btn-block" style="background:#0088cf; font-size: 17px;"><b>Log In</b></button>
			</div>
			
			<p class="pull-right"><a href="">Forgot Password?</a></p>
			</div>
			
			<div class="row"></div>
			<hr />
			
			<p>Don't have an Account? <a href="register.php">Create Account</a></p>
		</form>
		
		</div>
		
	</div>
</div>
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>	
	<script type="text/javascript" src="/assets/js/custom.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrapValidator.js"></script>
	
	<script>
		$(document).ready( function (){
			$('#regform')
				.bootstrapValidator({
					//disable
					excluded: [':disabled'],
					
					//fields
					fields: {
						
						email: {
							validators: {
								notEmpty: {
									message: 'Please enter an email address'
								},
								regexp: {
									regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
									message: 'The value is not a valid email address'
								}
							}
						},
						
						password: {
							validators: {
								notEmpty: {
									message: 'Please enter password'
								}
							}
						}						
					}					
				
				});
		});
	</script>
</body></html>