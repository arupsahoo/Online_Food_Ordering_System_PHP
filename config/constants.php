<?php 
// starting a session
session_start();

// Create constants to store non repeating values
define('SITEURL','http://localhost/project3/');

// Creating connection to the database
$conn = mysqli_connect('localhost','root','','project3') or die(mysqli_error());
  
?>