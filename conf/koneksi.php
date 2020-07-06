<?php  

error_reporting(2);

//Database Configuration
$db_name 	= "galuhmas_tiket_waw";
$host		= "localhost";
$username	= "root";
$password	= "";

//make connection to database
$conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");


?>