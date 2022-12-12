<?php include('partials/menu.php'); ?>
<?php
    if(isset($_SESSION['user-not-found'])){

echo $_SESSION['user-not-found']; // Displaying message
unset($_SESSION['user-not-found']); // removing message
}
?>

<?php
    if(isset($_SESSION['pwd-not-match'])){

echo $_SESSION['pwd-not-match']; // Displaying message
unset($_SESSION['pwd-not-match']); // removing message
}
?>
<?php 
// Process the value from the form and save it in the database
// Check whether the submit button is clicked or not
if(isset($_POST['submit'])){
     
    // Get the data from the form
     $current_password = md5($_POST['current_password']);
       $new_password = md5($_POST['new_password']);
      $confirm_password = md5($_POST['confirm_password']);

      $id = $_POST['id'];
     //$password = md5($_POST['password']); // encrypting password using md5

     // check whether the user with current id and passwrd exits or not
     $sql =" SELECT * FROM tbl_admin WHERE id ='$id' AND 
     password = '$current_password' ";

      // Executing query and saving data into database
     $res = mysqli_query($conn, $sql)  or die(mysqli_error());
     if($res){
     
        $count = mysqli_num_rows($res);
        if($count == 1){
    // echo "user found";

     // check the new and confirm password match or not
     if($new_password == $confirm_password){
       // echo "Matched password";
       // Update the password
       $sql2 = "UPDATE tbl_admin SET password = '$new_password'
       WHERE password = '$current_password'";
       $res2 = mysqli_query($conn, $sql2);
       // Check password is updated or not
       if($res2){
        $_SESSION['pwd-change'] = "<div class='success'>Password changed successfully</div>";
        // Redirect page
        header("location:".SITEURL.'admin/manage-admin.php');
       }
     }
     else{
        $_SESSION['pwd-not-match'] = "<div class='error'>Password not matched!</div>";
        // Redirect page
        header("location:".SITEURL.'admin/update-password.php? id='. $id);
   
     }
    

     }
     else
     {
    
     $_SESSION['user-not-found'] = "<div class='error'>Wrong password! Try again</div>";
     // Redirect page
     header("location:".SITEURL.'admin/update-password.php? id='. $id);

     }

} }

?>

<?php
if(isset($_GET['id'])){
 // 1- Get the id of the adimin for update
 $id = $_GET['id'];
}

 
 ?>

<div class="main-content">
    <div class="wrapper">
    <h1>
       Change Password
    </h1>
    

    <form action="" method="POST">
       current password: <input type="text" name="current_password" 
        placeholder="current password" required>
       
 <br> <br>
        New password: <input type="text" name="new_password" 
        placeholder="New password" required> <br> <br>
       Confirm password: <input type="text" name="confirm_password" 
        placeholder="confirm password" required> <br> <br>
        <input type="hidden" name="id" value=
        "<?php echo $id ?>">

        
        
            <input type="submit" name="submit" value="Change Password" 
        class="btn-secondary" style="border-style: none;"> 
    </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

