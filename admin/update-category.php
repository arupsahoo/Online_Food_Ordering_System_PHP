<?php include('partials/menu.php'); ?>

<?php 
// Process the value from the form and save it in the database
// Check whether the submit button is clicked or not
if(isset($_POST['submit'])){
  //  echo "button clicked";


    // Get the data from the form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // 2.updating the new image if selected
      // check the image is selected or not
      if(isset($_FILES['img_name']['name']))
      {
        // Selct the image
        $image_name = $_FILES['img_name']['name'];

        //Check whethe the image is availble or not
        if($image_name != '')
        {
            // image is availble
            // A. upload the new image
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
                $_SESSION['category-update'] = "<div class = 'error'> Failed to upload image </div>";
                // Redirect to the same page
                header("location:".SITEURL."admin/manage-category.php");
                // stop the process
                die();
            }

            // B. Remove the current image
            if($current_image != ''){
            $remove_path = "../images/category/".$current_image;

            $remove = unlink($remove_path); 
            // check whether the image is removed or not
            // if not removed then stop the process and display message
            if($remove == false){
                 // set message
                 $_SESSION['category-update'] = "<div class = 'error'> Failed to remove image </div>";
                 // Redirect to the same page
                 header("location:".SITEURL."admin/manage-category.php");
                 // stop the process
                 die();
            }
          }
        }
        else
        $image_name = $current_image;
      }
      else
      {
        // select the current image
        $image_name = $current_image;
      }
      

     // sql query to insert above data into database
    $sql2 = "UPDATE tbl_category SET
        title = '$title',
        img_name = '$image_name',
        featured = '$featured',
        active = '$active'
        WHERE id = $id";

      // Executing query and saving data into database
     $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
     if($res2){
     // echo "data updated  successfully";
     // create a session variable to display message
     $_SESSION['category-update'] = "<div class='success'>Category updated successfully</div>";
     // Redirect page
     header("location:".SITEURL.'admin/manage-category.php');

     }
     else
     {
     //echo "Data is not updated";  
     $_SESSION['category-update'] = "<div class='error'>Failed to update category</div>";
     // Redirect page
     header("location:".SITEURL.'admin/manage-category.php');

     }

}


?>


<?php
if(isset($_GET['id'])){
 // 1- Get the id of the adimin for update
  $id = $_GET['id'];
 // echo 'getting the data';


 // 2 - sql query to retrive data from database
 $sql = "SELECT * FROM `tbl_category` WHERE id = $id";
  $res= mysqli_query($conn, $sql);
 if($res){
     $count = mysqli_num_rows($res);

    if($count == 1){
        // Get details
       // echo "Admin available";
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
              $current_image = $row['img_name'];
              $featured = $row['featured'];
              $active = $row['active'];
    }
    else{
        $_SESSION['category-update'] = 
"<div class='error'> Category not updated  please try again later</div>";
        // Redirect to manage admin page
        header("location:".SITEURL."/admin/manage-category.php");
    }
 }
}
else{
     // Creating session variable
$_SESSION['category-update'] = 
"<div class='error'> Category not updated  please try again later</div>";

// Redirecting to manage admin page
header("location:".SITEURL."admin/manage-category.php");
}
 ?>

<div class="main-content">
    <div class="wrapper">
    <h1>
        Update Category
    </h1>

    <form action="" method="POST" enctype="multipart/form-data">
            Title: <br>
            <input type="text" name="title" 
            value="<?php echo $title; ?>"> <br> <br>
            Current Image: <br>
            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" 
            alt="Image not added" width="150px"> <br> <br>
            Select Image: <br>
            <input type="file" name="img_name" > <br> <br>
            Featured -
            <input <?php if($featured == 'on')
            { echo 'checked';} ?> type="radio" name="featured" value="on">On
            <input <?php if($featured == 'off')
            { echo 'checked';} ?> type="radio" name="featured" value="off">Off
            <br> <br>
            Active - 
            <input <?php if($active == 'on')
            { echo 'checked';} ?> type="radio" name="active" value="on">On
            <input <?php if($active == 'off')
            { echo 'checked';} ?> type="radio" name="active" value="off">Off
            <br> <br>
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

