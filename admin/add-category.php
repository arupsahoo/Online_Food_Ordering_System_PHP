<?php include('partials/menu.php'); ?> 
<div class="main-content">
    <div class="wrapper">
        <h1>Add Categories</h1>
        <?php
     if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
     }
    ?>
        <?php
     if(isset($_SESSION['category'])){
        echo $_SESSION['category'];
        unset($_SESSION['category']);
     }
    ?>
        <?php 

// check submit button is clicked or not
 if(isset($_POST['submit']))
 {
   // echo "button clicked";
   
   // Getting data from form
    $title = $_POST['title'];
    
   // check whether the value of featured and active is set or not
   if(isset($_POST['featured']))
   $featured = $_POST['featured'];
   else
   $featured = "off";

   if(isset($_POST['active']))
   $active = $_POST['active'];
   else
   $active = "off";


 /* var_dump($_FILES['img_name']);
 } */
 
  
  // check the image is uploaded or not and select image name accordingly
   //print_r($_FILES[]);

  // die(); // Break the code here
   if(isset($_FILES['img_name']['name'])){
    
    // upload the image
    // To upload an image we need image name, source path and destination path
    $image_name =  $_FILES['img_name']['name'];
    if($image_name != '')
    {

    // Auto renaming our image
    // Get the extension of our image (.jpg, .png, )
    $ext = end(explode('.',$image_name));

    // Rename the image
    $image_name = $title.rand(000, 999).'.'.$ext;
    $source_path = $_FILES['img_name']['tmp_name'];
    $destination_path = "../images/category/".$image_name;

    //finally upload the image
    $upload = move_uploaded_file($source_path, $destination_path);

    // Check image is uploade or not
    // If image is not uploade then we will stop the process and show a error message
    if($upload == false){
        // set message
        $_SESSION['upload'] = "<div class = 'error'> Failed to upload image </div>";
        // Redirect to the same page
        header("location:".SITEURL."admin/add-category.php");
        // stop the process
        die();
    }
     }
   }
   else{
    // do not upload image and set image name as blank
   // set message
   $_SESSION['upload'] = "<div class = 'error'> Failed to upload image </div>";
   // Redirect to the same page
   header("location:".SITEURL."admin/add-category.php");
   // stop the process
   die();
   }
 

 // sql query to insert data into the database
 $sql ="INSERT INTO tbl_category (title, img_name , featured, active)
  VALUES ( '$title', '$image_name', '$featured', '$active')";
 
 // executing the sql query
$res = mysqli_query($conn, $sql);
if($res){
    // echo "data inserted";
    $_SESSION['category'] = "<div class='success'> Category added successfully </div>";
    header("location:".SITEURL."admin/manage-category.php");
}
else{
    $_SESSION['category'] = "<div class='success'> Failed to add category </div>";
    header("location:".SITEURL."admin/add-category.php");
}

 }
// end 
  

?> 
       
        <!-- Creating form for adding categories -->
        <form action="" method="POST" enctype="multipart/form-data">
            Title: <br>
            <input type="text" name="title" 
            placeholder="Category title"> <br> <br>
            Select Image: <br>
            <input type="file" name="img_name" > <br> <br>
            Featured -
            <input type="radio" name="featured" value="on">On
            <input type="radio" name="featured" value="off" checked="checked">Off
            <br> <br>
            Active - 
            <input type="radio" name="active" value="on">On
            <input type="radio" name="active" value="off" checked="checked">Off
            <br> <br>
            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
        </form>
        
    </div>
</div>


<?php include('partials/footer.php'); ?> 