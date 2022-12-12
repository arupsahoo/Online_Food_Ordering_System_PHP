<?php
// Authorization
// check whether the user is logged in or not 
if(!isset($_SESSION['user'])){
    $_SESSION['not-logedin'] = "<div class='error'> Log in to access the admin panel</div>";
    // Redirect to log in page
    header("location:".SITEURL."admin/login.php");
}

?>