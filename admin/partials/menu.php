<?php include('../config/constants.php');
// including the log in check file
include('login-check.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food order admin - homepage</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <!-- Menu section starts here -->
    <div class="menu text-center">
       <div class="wrapper">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="manage-admin.php">Admin</a></li>
        <li><a href="manage-users.php">Users</a></li>
        <li><a href="manage-category.php">Category</a></li>
        <li><a href="manage-food.php">food</a></li>
        <li><a href="manage-order.php">order</a></li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
       </div>
    </div>