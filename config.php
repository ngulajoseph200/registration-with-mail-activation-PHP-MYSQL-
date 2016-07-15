<?php

/*Defining constant to connect to database */
DEFINE('DATABASE_USER', 'countyko_francis');
DEFINE('DATABASE_PASSWORD', 'francis2016');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'countyko_proj');

/*Default time zone ,to be able to send mail */
date_default_timezone_set('UTC');

/*You might not need this */
ini_set('SMTP', "mail.myt.mu"); // Overide The Default Php.ini settings for sending mail


//This is the address that will appear coming from ( Sender )
define('EMAIL', 'developerfrank9@gmail.com');

/*Defining the root url where the script will be found */
DEFINE('WEBSITE_URL', 'http://tests.countykonnect.com');


// Make the connection:
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

if (!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>