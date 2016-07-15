<?php 
	//buffering headers
	@ob_start();
	//Start session
    session_start();	
	
	include 'config.php';
	
	if(isset($_POST['formsubmitted'])){
	
	//declaring login crentitals
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//selecting user logon crentitals from the database
	$query_credentials = "select * from users where email='$email' and password='".md5($password)."' and activation ='NULL' ";
	$result_query_credentials = mysqli_query($dbc, $query_credentials);
	
	//if user is already registered
	if(mysqli_num_rows($result_query_credentials) == 1){
	
	$result = mysqli_fetch_array($result_query_credentials);
	
	//declaring session variables
	$_SESSION['email'] = $result['email'];
	$_SESSION['name'] = $result['username'];
	
	//redirect to homepage
	header('location: index.php');
	}
	
	//if user not registered,toast message
	else{
		echo '<script>
				alert("Either Your Account is inactive or email address or password is incorrect");
				history.go(-1);
			</script>';
	}
	
	
	}
		
?>