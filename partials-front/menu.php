<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Online food delivery website -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online food order</title>

    <!-- Linking our css file -->
    <link rel="stylesheet" href="CSS/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <!-- Navbar section starts here -->
    <section class="navbar" 
        <div class="container">
        <div class="logo">
            <img src="images/ordersta.png" alt="logo" class="img-responsive" >
          <!--  <h3>Online Food Delivery</h3> -->
        </div>
        <div class="menu text-right">
           <ul>
            <li>
                <a href="<?php echo SITEURL; ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo SITEURL; ?>/categories.php">Categories</a>
            </li>
            <li>
                <a href="<?php echo SITEURL; ?>/foods.php">Foods</a>
            </li>
            <?php
            if(!isset($_SESSION['loggedin']))
            {
                ?>
            <li>
                <a href="<?php echo SITEURL; ?>sign-up.php">Register</a>
            </li>
            <li>
                <a href="<?php echo SITEURL; ?>log-in.php">Log in</a>
            </li>
            <?php
            }
            else
            {
            ?>
            <li>
                <a href="<?php echo SITEURL; ?>myorders.php">My orders</a>
            </li>
            <li>
                <a href="<?php echo SITEURL; ?>logout.php">Log out</a>
            </li>
            <?php
            }
            ?>
           </ul>
        </div>
        <div class="clearfix"></div>
        </div>
       
    </section>
    <!-- Navbar section ends here -->