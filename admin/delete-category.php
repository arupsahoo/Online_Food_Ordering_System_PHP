<?php
// Include constants.php here
include('../config/constants.php');


// echo $id = $_GET['id'];
//  echo $image_name = $_GET['img_name'];


// Deleting the category
// echo "Delete admin <br>"; 
// 1- Getting the id of the admin
if(isset($_GET['id']) && isset($_GET['img_name']))
{
 $id = $_GET['id'];
 $image_name = $_GET['img_name'];

 // Remove the physical avialable image if available
 if($image_name!="")
 {
   // Image is available so remove it
   $path = "../images/category/".$image_name;
   // removing the image
   $remove = unlink($path);
   // Check if image is removed or not
   if($remove == false)
   {
      $_SESSION['remove'] = "<div class='error'>Failed to remove category image</div>";
      // Redirect to manage category page
      header("location:".SITEURL."admin/manage-category.php");
      // stop the process
      die();
   }
 }
 
 // 2 - executing query to delete admin
 $sql = "DELETE FROM tbl_category WHERE `tbl_category`.`id` = $id";
 $res = mysqli_query($conn, $sql);

 // Check wheter admin deleted or not
 if($res){
    echo "Category deleted";
    // Creating session variable
    $_SESSION['category-delete'] = "<div class='success'>Category deleted successfully</div>";

    // Redirecting to manage admin page
    header("location:".SITEURL."admin/manage-category.php");

 }
 else{
// Creating session variable
$_SESSION['category-delete'] = 
"<div class='error'>Category not deleted please try again later</div>";

// Redirecting to manage admin page
header("location:".SITEURL."admin/manage-category.php");
 }
}
else
{
   // Creating session variable
$_SESSION['category-delete'] = 
"<div class='error'> Category not deleted please try again later</div>";

// Redirecting to manage admin page
header("location:".SITEURL."admin/manage-category.php");
}


?>