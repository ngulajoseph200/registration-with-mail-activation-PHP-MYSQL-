<?php include './includes/auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>welcome <?php echo ''.strtolower($_SESSION['name']).'' ;?></title>

<?php 
    //database connections
   include 'config.php';
   //header
   include './includes/head.php'; 
?>

</head>
<body>
	<div class="container">
		<h3>Hi <?php echo ''.strtolower($_SESSION['name']).'' ;?></h3>
                <h4><a href="logout.php">Logout</a></h4>
		
		<!-- rest of your content to go here -->
		
		<!-- include rest of javascript files here -->
	</div>
</body></html>