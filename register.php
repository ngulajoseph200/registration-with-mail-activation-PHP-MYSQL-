<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<?php 
    //database connections
   include 'config.php';
   //header
   include './includes/head.php'; 
?>

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
		
		<?php 
			
			if(isset($_POST['regbtn'])){
			
			$username = $_POST['username'];
			$email = $_POST['email'];
			$pass1 = $_POST['pass1'];
			$date = date('d/m/y');
			
			//checking whether the email adress has been registered already
			$query_verify_email = "select * from admin where email='$email'";
			$result_verify_email = mysqli_query($dbc, $query_verify_email);
			
			if (mysqli_num_rows($result_verify_email) == 0) {
			//creating a unique registration key
			$activation = md5(uniqid(rand(), true));
			
			$query_insert_user = "INSERT INTO users (username, email, password, activation, date_registered) VALUES ('$username', '$email', '".md5($pass1)."', '$activation', '$date')";
			
			//on successful submission toast message
			if(mysqli_query($dbc, $query_insert_user) === true){
				
				// Sending activation mail:
                $message = " Hi ".$username." \n To activate your account, please click on this link:\n\n";
                $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($email) . "&key=$activation";
                mail($email, 'Registration Confirmation', $message, 'From: developerfrank9@gmail.com');
				
				// Finish the page:
				echo '<div class="alert alert-success">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="close">&times;</button>
					Thank you <b>'.$username.' </b> for registering. A confirmation email has been sent to <b>'.$email.'</b>.
					Please click on the Activation Link to Activate your account</div>';
			}
			
			else{
				echo '<div class="alert alert-danger">Whoops!! Something went wrong while registering!</div>';
			}
			
			}
			//if email exists
			else{
				echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="close">&times;</button>
					  Whoops!! That email address <b>('.$email.')</b> has been already registered. Choose another email please!</div>';
			}
			
			}
		?>
		
		<form role="form" id="regform" action="" method="post">
			<div class="form-group modal-header">
				<h3 class="modal-title text-center"><b><span style="color:#31b0d5">Sign-Up with</span> mail activation</b></h3>
			</div>
			<div class="form-group"><h5 class="text-center"><b>Sign up for free today!</b></h5></div>
			
			<div id="inner_inputs">
			<div class="form-group">
				<i class="fa fa-user"></i>
				<input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" />
			</div>
			
			<div class="form-group">
				<i class="fa fa-envelope"></i>
				<input type="email" name="email" class="form-control" placeholder="Email Address" />
			</div>
			
			<div class="form-group">
				<i class="fa fa-key"></i>
				<input type="password" name="pass1" class="form-control" placeholder="Password" />
			</div>
			
			<div class="form-group">
				<i class="fa fa-key"></i>
				<input type="password" name="pass2" class="form-control" placeholder="Confirm password" />
			</div>
			
			<div class="form-group">
				<button type="submit" name="regbtn" class="btn btn-info btn-block" style="background:#0088cf; font-size: 17px;"><strong>Create Account</strong></button>
			</div>
			<small>By registering, you agree to our <a href="">Terms and Conditions</a> and <a href="">Privacy Policy</a></small>
			
			<hr>
			
			<p>Already have an account? <a href="login.php">Log in</a></p>
			</div>
		</form>
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
						username: {
							validators: {
								notEmpty: {
									message: 'Please enter a username'
								},
								stringLength:{
									min:6,
									max:20,
									message: 'Username to contain at least 6 but less than 20 characters in length'
								}
							}
						},
						
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
						
						pass1: {
							validators: {
								notEmpty: {
									message: 'Please enter password'
								}
							}
						},
						
						pass2: {
							validators: {
								notEmpty: {
									message: 'Please confirm password'
								},
								identical:{
									field: 'pass1',
									message: 'The password and it\'s confirm do not much '
								}
							}
						}
						
					}					
				
				});
		});
	</script>

</div>

</body></html>