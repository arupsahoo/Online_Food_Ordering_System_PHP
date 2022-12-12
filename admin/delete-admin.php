<?php
// Include constants.php here
include('../config/constants.php');

// Deleting the admin
// echo "Delete admin <br>"; 
// 1- Getting the id of the admin
 $id = $_GET['id'];
 
 // 2 - executing query to delete admin
 $sql = "DELETE FROM tbl_admin WHERE `tbl_admin`.`id` = $id";
 $res = mysqli_query($conn, $sql);

 // Check wheter admin deleted or not
 if($res){
    echo "Admin deleted";
    // Creating session variable
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";

    // Redirecting to manage admin page
    header("location:".SITEURL."admin/manage-admin.php");

 }
 else{
// Creating session variable
$_SESSION['delete'] = "<div class='error'>Admin not deleted please try again later</div>";

// Redirecting to manage admin page
header("location:".SITEURL."admin/manage-admin.php");
 }

?>