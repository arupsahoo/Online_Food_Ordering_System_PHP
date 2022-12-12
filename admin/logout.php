<?php 
// including the constants.php for SITEURL
include('../config/constants.php');

// destroying all the sessions
session_destroy(); // This will unset the $_SESSION['user']

// Redirect to login page
header("location:".SITEURL."admin/login.php");

?>