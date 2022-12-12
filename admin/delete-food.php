<?php
// Include constants.php here
include('../config/constants.php');

// echo $_GET['img_name'];
// echo $_GET['id'];
if(isset($_GET['id']) && isset($_GET['img_name']))
{
  //echo "process to delete";  
  $id = $_GET['id'];
  $image_name = $_GET['img_name'];
  // removing image from physical folder if available
  if($image_name != '')
  {
    $path = '../images/foods/'.$image_name;
    $remove = unlink($path);
    
    // check if image is deleted or not
    if($remove == false){
        // failed and redirecting to manage food page
        $_SESSION['delete-food'] = "<div class='error'>Failed to delete image</div>";
        header("location:".SITEURL."/admin/manage-food.php");
        //stop the process of deleting food
        die();
    }
  }
  // 2- sql query to delete the food
  $sql = "DELETE FROM tbl_food WHERE id = $id";
  $res = mysqli_query($conn, $sql);
  // checking query executed or not
  if($res){
    $_SESSION['delete-food'] = "<div class='success'>Food deleted successfully</div>";
    header("location:".SITEURL."/admin/manage-food.php");
  }
  else{
    $_SESSION['delete-food'] = "<div class='error'>Failed to delete food</div>";
    header("location:".SITEURL."/admin/manage-food.php");
  }
}
else
 {
  // Redirect to manage food page and display error message 
  $_SESSION['delete-food'] = "<div class='error'>Failed to delete food</div>";
  header("location:".SITEURL."/admin/manage-food.php");
 }

?>