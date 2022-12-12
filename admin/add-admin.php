<?php include('partials/menu.php'); ?>

<?php
 if(isset($_SESSION['add'])){

    echo $_SESSION['add']; // Displaying message
    unset($_SESSION['add']); // removing message
}
 ?>
 <?php 
// Process the value from the form and save it in the database
// Check whether the submit button is clicked or not
if(isset($_POST['submit'])){
    // Get the data from the database
     $full_name = $_POST['full_name'];
      $username = $_POST['username'];
     $password = md5($_POST['password']); // encrypting password using md5

     // sql query to insert above data into database
     $sql = "INSERT INTO `tbl_admin` ( `full_name`, `username`, `password`)
      VALUES ( '$full_name', '$username', '$password')";

      // Executing query and saving data into database
     $res = mysqli_query($conn, $sql) or die(mysqli_error());
     if($res){
     // echo "data inserted successfully";
     // create a session variable to display message
     $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
     // Redirect page
     header("location:".SITEURL.'admin/manage-admin.php');

     }
     else
     {
     //echo "Data is not inserted";  
     $_SESSION['add'] = "<div class='error'>Data insertion failed</div>";
     // Redirect page
     header("location:".SITEURL.'admin/add-admin.php');

     }

}
?>

<div class="main-content">
    <div class="wrapper">
    <h1>
        Add Admin
    </h1>

    <form action="" method="POST">
        Full Name: <input type="text" name="full_name"> <br> <br>
        username: <input type="text" name="username"> <br> <br>
        Password: <input type="password" name="password" placeholder="password"> <br> <br>
            <input type="submit" name="submit" value="submit" 
        class="btn-secondary " > 
    </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>


