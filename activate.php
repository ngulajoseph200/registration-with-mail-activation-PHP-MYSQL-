<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Activate Your Account</title>

<?php 
    //database connections
   include 'config.php';
   //header
   include './includes/head.php'; 
?>

</head>

<body style="background: #eee;">
	<nav class="navbar navbar-default top" role="navigation" style="margin-bottom: 0; background: #777 !important; border-radius:0 !important;">
	     <section class="container">
			<div class="navbar-header">
                
                <a class="navbar-brand" href="http://hotel.countykonnect.com/"style="color:#fff;"><b><span style="color:#31b0d5">Hotel</span>web</b></a>
				
            </div>
            

		</section>
    </nav>

		<div class="container"><br><br>
		<div class="col-sm-5" style="float:none; margin:auto; background: #fafafa; padding: 20px 15px; opacity: 1;">
		<div class="form-group modal-header">
			<h3 class="modal-title text-center"><b><span style="color:#31b0d5">Hotel</span>web</b></h3>
		</div>
		<?php

			if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
			{
				$email = $_GET['email'];
			}
			
			if (isset($_GET['key']) && (strlen($_GET['key']) == 32))//The Activation key will always be 32 since it is MD5 Hash
			{
				$key = $_GET['key'];
			}


			if (isset($email) && isset($key)){

				// Update the database to set the "activation" field to null

				$query_activate_account = "UPDATE users SET activation= 'NULL' WHERE(email ='$email' AND activation='$key')LIMIT 1";

			   
				$result_activate_account = mysqli_query($dbc, $query_activate_account) ;

				// Print a customized message:
				if (mysqli_affected_rows($dbc) == 1)//if update query was successfull
				{
				echo '<div class="success">Your account is now active. You may now <a href="login.php">Log in</a></div>';

				} else
				{
					echo '<div class="errormsgbox">Oops! You had already activated your account!</div>';

				}

				mysqli_close($dbc);

			} else {
					echo '<div class="errormsgbox">Error Occured .</div>';
			}

		?>
		</div>
		</div>
</body>
</html>
