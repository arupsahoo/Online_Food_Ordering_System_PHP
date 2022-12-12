<?php  include('partials-front/menu.php'); 
 ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>login</title>
  
   
      <link rel="stylesheet" href="CSS/log-in.css">

	  <style type="text/css">
	  #buttn{
		  color:white;
		  background-color: green;
	  }
	  </style>
  
</head>

<body>
<?php 

    
if(isset($_POST['submit'])) 
{
    
    $email = $_POST['email'];
   
    $password = md5($_POST['password']);
   
   /*  $login = false;
    $showErr = false;
    */
       $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
       $res = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($res);
       echo $num;
       if($num == 1)
       {
        $login = true;
        $row = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $row['id'];
  
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['login'] = "log in success";
        header("location:". SITEURL );
       }   
       else
       {
        session_start();
        $_SESSION['loginf'] = "Invalid Credentials";
        header("location: log-in.php");
       }   
    
} ?>

   

   <!--  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Success!</h4>
  <p> you have successfully signed up and now you can log in</p>
  <hr> -->

<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Login Form</h1>
</div>
<?php 
// echo $_SESSION['loginf'];
if(isset($_SESSION['loginf']))
    {
     ?>
        <div class="alert alert-dismissible fade show alert-danger error text-center" role="alert">
  <strong>Error!</strong> <?php echo $_SESSION['loginf']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['loginf']);
    }


if(isset($_SESSION['signup']))
    {
     ?>
        <div class="alert alert-dismissible fade show alert-success success text-center" role="alert">
  <strong>Success!</strong> <?php echo $_SESSION['signup']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['signup']);
    }



    if(isset($_SESSION['logout']))
{
    ?>
  <div class="alert alert-dismissible fade show alert-success  success text-center" role="alert">
    <strong></strong><?php echo $_SESSION['logout']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
    unset($_SESSION['logout']);
  }

    if(isset($_SESSION['login-check']))
{
 echo $_SESSION['login-check']; 
 
    unset($_SESSION['login-check']);
  }
    
?>
  
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Login to your account</h2>
	  <span style="color: green;"></span> 
   <span style="color: green;"></span>
    <form action="" method="post">
      <input type="text" placeholder="Email"  name="email" required/>
      <input type="password" placeholder="Password" name="password" required/>
      <input type="submit" id="buttn" name="submit" value="login" />
    </form>
  </div>
  
  <div class="cta">Not registered?<a href="sign-up.php" style="color:green;">
   Create an account</a></div>
</div>
<br> <br>
  
  





<?php include('partials-front/footer.php'); ?>
