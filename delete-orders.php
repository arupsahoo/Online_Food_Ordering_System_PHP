<?php
// Include constants.php here
include('config/constants.php');

// echo $_GET['img_name'];
// echo $_GET['id'];
echo $_GET['user_id'];
if(isset($_GET['user_id']) )
{
  //echo "process to delete";  
  $user_id = $_GET['user_id'];
 
  // 2- sql query to delete the food
  $sql = "DELETE FROM tbl_order WHERE user_id = $user_id";
  $res = mysqli_query($conn, $sql);
  // checking query executed or not
  if($res){
    $_SESSION['delete-order'] = "<div class='success'>Order deleted successfully</div>";
    header("location:".SITEURL."myorders.php");
  }
  else{
    $_SESSION['delete-order'] = "<div class='error'>Failed to delete order</div>";
    header("location:".SITEURL."myorders.php");
  }
}
else
 {
  // Redirect to manage food page and display error message 
  $_SESSION['delete-food'] = "<div class='error'>Failed to delete food</div>";
  header("location:".SITEURL."myorders.php");
 }

?>