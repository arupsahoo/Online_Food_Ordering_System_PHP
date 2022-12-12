<?php 


include('partials-front/menu.php'); 




?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>sign up</title>
  
   
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
if(isset($_SESSION['signup-fail']))
{
    ?>
  <div class="alert alert-dismissible fade show alert-danger error text-center" role="alert">
    <strong>Error!</strong><?php echo $_SESSION['signup-fail']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
    unset($_SESSION['signup-fail']);
  }
  ?>
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Sign Up Form</h1>
</div>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
   
    $existsql = "SELECT * FROM users WHERE email = '$email'";
    $existres = mysqli_query($conn, $existsql);
    $n = mysqli_num_rows($existres);
   
    if($password == $cpassword )
    {
      if($n > 0){
        $_SESSION['signup-fail'] = "Email already exists";
        header("location: sign-up.php");
      }
      else
      {

       $sql = "INSERT INTO users SET
             full_name = '$full_name', email = '$email', contact = $contact,
             password = '$password', date = current_timestamp() ";
       $res = mysqli_query($conn, $sql);
       if($res)
       {
       
        $_SESSION['signup'] = "Signed up successfully Now you can log in";
        header("location: log-in.php");
       }  
       }    
    }
    else
    {
      
        $_SESSION['signup-fail'] = "Password mismatch";
        header("location: sign-up.php");
    }
   
}

?>

<!-- Form Module-->
<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Sign Up here</h2>
	  <span style="color: green;"></span> 
   <span style="color: green;"></span>
    <form action="" method="post">
       Full Name: 
      <input type="text" maxlength="40" placeholder="Full Name"  name="full_name" required/>
      Email:
      <input type="text" maxlength="40" placeholder="Email"  name="email" required/>
      Contact No- 
      <input type="number" placeholder="Phone number"  name="contact" 
      maxlength="10" required/>
      Password:
      <input type="password" placeholder="Password" name="password" required/>
      Confirm Password:
      <input type="password" placeholder="confirm Password" name="cpassword" required/>
      <input type="submit" id="buttn" name="submit" value="Sign Up" />
    </form>
  </div>
  
  <div class="cta">Already registered?<a href="log-in.php" style="color:green;">
   Log in here</a></div>
</div>

<br> <br>
  
  


<?php
 include('partials-front/footer.php');
?>
