<?php 
// Including the constant file
include('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to Admin</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
<?php
             if(isset($_SESSION['login-fail'])){
                echo $_SESSION['login-fail']; // Displaying message
                echo "<br>";
                unset($_SESSION['login-fail']); // removing message
             }
            ?>
<?php
  // checking if button is clicked or not
  if(isset($_POST['submit'])){
    // Get the data from the form
  $username = mysqli_real_escape_string($conn,$_POST['username']);
   $password = md5($_POST['password']);

    // creating sql query
    $sql = "SELECT * FROM tbl_admin WHERE username = '$username'
    AND password = '$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    if($count == 1){
        // Log in successfull
        $_SESSION['login'] = "<div class='success'>Log in successfull</div>";
        // Redirecting
        $_SESSION['user'] = $username; // To check wheter the the user is logged in or not
        header("location:".SITEURL."admin/");
    }
    else{
        // Log in failed
        $_SESSION['login-fail'] = "<div class='error center'>Username password not found</div>";
        // Redirecting
        header("location:".SITEURL."admin/login.php");
    }
  }
?>
    <div class="login ">
        <h2 class="text-center">Log in to Admin</h2>  <br> 
        
        <div class="margin-left">
        <?php 
        if(isset($_SESSION['not-logedin'])){
            echo $_SESSION['not-logedin'];
            echo "<br>";
            unset($_SESSION['not-logedin']);
        }
        ?>
        <form action="" method="POST">
            <label for="username">Username:</label> <br>
            <input type="text" name="username" id="username" 
            placeholder="Enter your username" required> <br> <br>
            <label for="password">Password:</label> <br>
            <input type="password" id="password" name="password" 
            placeholder="Enter your password here" required>
            <br> <br>
            
            <input type="submit" name="submit" value="Log in" 
            class="btn-primary">
            
        </form>
        </div>
    </div>
    
</body>
</html>

