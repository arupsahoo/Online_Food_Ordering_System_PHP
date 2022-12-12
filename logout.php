<?php include('partials-front/menu.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log out</title>
    
  </head>
  <body>
    <?php 
    
    session_unset();
    session_destroy();
     // This will destroy all the data
     session_start();
     unset($_SESSION['user_id']);
     
     $_SESSION['logout'] = "<div class='success'> Logged out successfully </div>";
    header("location:". SITEURL );
    ?>
    
 <?php   include('partials-front/footer.php'); ?>