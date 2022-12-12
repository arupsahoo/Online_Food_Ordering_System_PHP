<?php include('partials/menu.php'); ?>
<?php 
// Process the value from the form and save it in the database
// Check whether the submit button is clicked or not
if(isset($_POST['submit'])){
    echo "button clicked";
    // Get the data from the database
    echo $full_name = $_POST['full_name'];
      echo $username = $_POST['username'];
     echo $id = $_POST['id'];
     //$password = md5($_POST['password']); // encrypting password using md5

     // sql query to insert above data into database
     $sql =" UPDATE `tbl_admin` 
     SET full_name = '$full_name', username = '$username'
     WHERE `tbl_admin`.id = '$id' ";

      // Executing query and saving data into database
     $res = mysqli_query($conn, $sql) or die(mysqli_error());
     if($res){
     // echo "data updated  successfully";
     // create a session variable to display message
     $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
     // Redirect page
     header("location:".SITEURL.'admin/manage-admin.php');

     }
     else
     {
     //echo "Data is not updated";  
     $_SESSION['add'] = "<div class='error'>Failed to update admin</div>";
     // Redirect page
     header("location:".SITEURL.'admin/manage-admin.php');

     }

}

?>

<?php
if(isset($_GET['id'])){
 // 1- Get the id of the adimin for update
 $id = $_GET['id'];
}

 // 2 - sql query to retrive data from database
 $sql = "SELECT * FROM `tbl_admin` WHERE id = $id";
  $res= mysqli_query($conn, $sql);
 if($res){
     $count = mysqli_num_rows($res);

    if($count == 1){
        // Get details
       // echo "Admin available";
        $row = mysqli_fetch_assoc($res);
         $full_name = $row['full_name']; 
        $username = $row['username'];

    }
    else{
        // Redirect to manage admin page
        header("location:".SITEURL."/admin/manage-admin.php");
    }
 }
 ?>

<div class="main-content">
    <div class="wrapper">
    <h1>
        Update Admin
    </h1>

    <form action="" method="POST">
        Full Name: <input type="text" name="full_name" value=
        "<?php echo $full_name ?>"> <br> <br>
        username: <input type="text" name="username" value=
        "<?php echo $username ?>"> <br> <br>
        <input type="hidden" name="id" value=
        "<?php echo $id ?>">
        
            <input type="submit" name="submit" value="Update Admin" 
        class="btn-secondary" style="border-style: none;"> 
    </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

