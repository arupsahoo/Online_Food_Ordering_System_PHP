<?php include('partials/menu.php'); ?>
 
<div class="main-content">
    <div class="wrapper" >
        <h1 style="margin-left: 12%;">Update Food</h1>
        <?php
     if(isset($_SESSION['upload-food'])){
        echo $_SESSION['upload-food'];
        unset($_SESSION['upload-food']);
     }
     if(isset($_SESSION['uploade-fail'])){
        echo $_SESSION['uploade-fail'];
        unset($_SESSION['uploade-fail']);
     }
     /* echo $_GET['id']; */
     if(isset($_GET['id']))
     {
       // Get the id and retrive other data from database
       $id = $_GET['id'];
       $sql2 = "SELECT * FROM tbl_food WHERE id = $id";
       $res2 = mysqli_query($conn, $sql2);

       $row2 = mysqli_fetch_assoc($res2);

      
      
       $title = $row2['title'];
       $description = $row2['description'];
       $price = $row2['price'];
       $current_image = $row2['image_name'];
       $current_category = $row2['category_id'];
       $featured = $row2['featured'];
       $active = $row2['active'];

     }
     else
     {
        // redirect to manage food section and show error message
        $_SESSION['upload-food'] = "<div class='error'>Failed to upload food</div>";
        header("location:".SITEURL."admin/manage-food.php");
     }
    ?>

<?php
// Adding the form data into database
if(isset($_POST['submit']))
{
    // echo "button clicked";
    // 1- Get the data from form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $category = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    
    //2- Check if the image is uploaded or not
    if(isset($_FILES['image_name']['name']))
    {
        // Uploade button is clicked
        $image_name = $_FILES['image_name']['name'];
        
        // check whether the image is selected or not
        if($image_name != '')
        {
            // Rename the image
            $ext = end(explode('.', $image_name));

            $image_name = $title.rand(000, 999).'.'.$ext;
            // Getting source and destination path to move the image
            $src = $_FILES['image_name']['tmp_name'];
            $dst = "../images/foods/".$image_name;
            $upload = move_uploaded_file($src, $dst);
            if($upload == false)
            {
                $_SESSION['uploade-fail'] = "<div class='error'>Failed to update image</div>";
                header("location:".SITEURL."admin/update-food.php? id=".$id);
                die();
            }
            // Remove the current image if availble
            if($current_image != '')
            {
                $remove_path = "../images/foods/".$current_image;
                $remove = unlink($remove_path);
                // check whether the image is removed or not
                if($remove == false)
                {
                    // Failed to remove image
                    
                $_SESSION['uploade-fail'] = 
                "<div class='error'>Failed to remove current image</div>";

                header("location:".SITEURL."admin/update-food.php? id=".$id);
                
                die();
                } 
            }
        }
        else
        {
            $image_name = $current_image; 
        }
    }
    else
    {
        $image_name = $current_image;
    }

    // Getting the image file
   
    // inserting data into database
    $sql3 = "UPDATE tbl_food SET
             title = '$title',
             description = '$description',
             price = $price,
             image_name = '$image_name',
             category_id = '$category',
             featured = '$featured',
             active = '$active' WHERE id = $id
             ";


    $res3 = mysqli_query($conn, $sql3);
    if($res3)
    {
        $_SESSION['upload-food'] = "<div class= 'success'> Food updated successfully</div>";
        header("location:".SITEURL."admin/manage-food.php");
    }
    else
    {
        // 4- Redirect to manage-food page
        $_SESSION['upload-food'] = "<div class= 'success'> Failed to update food</div>";
    header("location:".SITEURL."admin/manage-food.php");
    }

    

    
}

?>
        
        <!-- Creating form for adding categories -->
    
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="float-form">  
            Title: <br>
            <input type="text" name="title" 
            value = "<?php echo $title; ?>"> <br> <br>

            Description: <br>
            <textarea name="description" cols="30" rows="3" 
            placeholder="food description"><?php echo $description; ?></textarea> <br> <br>

            Food price: <br>
            <input type="number" name="price" value="<?php echo $price; ?>"> <br> <br>

            Current Image: <br>
            <?php
            if($current_image != ''){
                ?>
            <img src="<?php echo SITEURL; ?>images/foods/<?php echo $current_image; ?>" 
            alt="Image not found" width="120px">
           
            <?php
            }
            else
            echo "<div class= 'error'>Image not found</div>";
            ?>




           </div>      
          <div class="float-form"> 
            Select Image: <br>
            <input type="file" name="image_name" > <br> <br>

            Category: <br>
            <select name="category" >

             <?php
              // Create SQL query to select data from database
              //1. Select all category elements where active is 'on'
              $sql = "SELECT * FROM tbl_category WHERE active = 'on'";
              $res = mysqli_query($conn, $sql);

              // counting the number of rows
              $count = mysqli_num_rows($res);

              if($count > 0)
              {
                // category found
                // Exporting the data and displaying using while loop
                while($row = mysqli_fetch_assoc($res))
                {
                  $category_id = $row['id'];
                  $title = $row['title'];
                  ?>
                  <option <?php if($current_category == $category_id){echo 'selected';} ?>
                  value="<?php echo $category_id; ?>"><?php echo $title; ?></option>
                  <?php
                }
              }
              else
              {
                // No category found
                ?>
                 <option value="0">No category found</option>
                 <?php

              }
             ?>
            </select> <br> <br>

            Featured: <br>
            <span>
                <input <?php if($featured == 'on') {echo 'checked';}?>
                type="radio" name="featured" value="on" id="on"> 
                <label for="on">On</label>
            </span>
            <span>
                <input <?php if($featured == 'off') {echo 'checked';}?> 
                type="radio" name="featured" value="off" id="off" >
                <label for="off">Off</label>
            </span> <br> <br>

            Active: <br>
            <span>
                <input <?php if($active == 'on') {echo 'checked';}?>
                 type="radio" name="active" value="on" id="on"> 
                <label for="on">On</label>
            </span>
            <span>
                <input <?php if($active == 'off') {echo 'checked';}?>
                 type="radio" name="active" value="off" id="off" >
                <label for="off">Off</label>
            </span> <br> <br>

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
        </div>     
        <div class="clearfix"></div>
        <!-- passing id and current image from the form -->
            <input type="submit" name="submit" value="Update Food" 
            class="btn-secondary button-middle">
        </form>
        
    </div>
</div>





<?php include('partials/footer.php'); ?>