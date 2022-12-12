<?php include('partials/menu.php') ?>
<?php
    // checking whether the button is clicked or not
    if(isset($_POST['submit']))
    {
       // echo "button clicked";
       $full_name = $_POST['full_name'];
       $email = $_POST['email'];
       $contact = $_POST['contact'];
       $date = $_POST['date'];
       $id = $_POST['id'];
       
       $sql2 = "UPDATE users SET
               full_name = '$full_name',
               email = '$email',
               contact = '$contact',
               date = '$date'
                WHERE id = $id"; 
        $res2 = mysqli_query($conn, $sql2);
        if($res2)
        {
            $_SESSION['update-user'] = "<div class='success'>User info updated successfully</div>";
            header("location:".SITEURL."admin/manage-users.php");
        }   
        else
        {
            // Redirect to manage order with error message
            $_SESSION['update-user'] = "<div class='error'>Failed to update user info</div>";
            header("location:".SITEURL."admin/manage-users.php");
        }     
    }
    ?>
<?php
if(isset($_GET['id'])){
 // 1- Get the id of the adimin for update
 $id = $_GET['id'];


 // 2 - sql query to retrive data from database
 $sql = "SELECT * FROM users WHERE id = $id";
  $res= mysqli_query($conn, $sql);
 if($res){
     $count = mysqli_num_rows($res);

    if($count == 1){
        // Get details
       // echo "Admin available";
        $row = mysqli_fetch_assoc($res);
        $full_name = $row['full_name'];
        $email = $row['email'];
         $contact = $row['contact']; 
         $date = $row['date'];
         

    }
    else{
        // Redirect to manage admin page
        header("location:".SITEURL."/admin/manage-users.php");
    }
 }
}
 ?>

<div class= "main-content">
 <div class="wrapper">
    <h1> Update User </h1>
    
    <form action="" method="POST">
       




        
        Full Name: <br>
        <input type="text" name="full_name" value="<?php echo $full_name; ?>"> <br> <br>
        email: <br>
        <input type="text" name="email" value="<?php echo $email; ?>"> <br> <br>
        contact: <br>
        <input type="number" name="contact" value="<?php echo $contact; ?>"> <br> <br>
        date: <br>
        <input type="datetime-local" name="date" value="<?php echo $date; ?>"> <br> <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <br> <br>

        <input type="submit" name="submit" value="Update user" 
            class="btn-secondary ">
        
        <div class="clearfix"></div>
    </form>

   
 </div>   
</div>

<?php include('partials/footer.php') ?>