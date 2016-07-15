<?php
session_start();

//destroy all sessions
if(session_destroy()){

//redirect to login page
header('location: login.php');

}

?>