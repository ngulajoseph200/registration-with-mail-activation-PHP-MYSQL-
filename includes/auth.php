<?php
///handiling errors
error_reporting(0);

//buffering headers
@ob_start();
//setting session on each secure page
session_start();

if(!isset($_SESSION['email'])) //You can still use other session variables of your wish from the database
{
	header('location:login.php');
}

?>