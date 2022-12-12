<?php include('partials/menu.php'); ?>
 
<div class="main-content">
    <div class="wrapper" >
        <h1 style="margin-left: 12%;">Add Food</h1>

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
    
     if(isset($_SESSION['failed-food'])){
        echo $_SESSION['failed-food'];
        unset($_SESSION['failed-food']);
     }

    ?>

        <?php
// Adding the form data into database
if(isset($_POST['submit']))
{
    // echo "button clicked";
    // 1- Get the data from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    // check whether the value of featured and active is set or not
    if(isset($_POST['featured']))
    $featured = $_POST['featured'];
    else
    $featured = "off";

    if(isset($_POST['active']))
    $active = $_POST['active'];
    else
    $active = "off";

    // Getting the image file
    if(isset($_FILES['img_name']['name']))
    {
        // Get the image
        $image_name = $_FILES['img_name']['name'];
        // Check whether the image is selected or not
        if($image_name != '')
        {
            // image is selected
            //1 - Rename the image
           // First removing the extension from name so that it 
           $ext = end(explode('.',$image_name)); // here $ext will hold the value 'jpg'
           $image_name = $title.rand(000,999).".".$ext;

            //2- Upload the image into the folder
            // To upload the image we need the source path and destination path
            $src = $_FILES['img_name']['tmp_name']; // source path
            $dst = "../images/foods/".$image_name; // Destination path

            // uploading the image
            $upload = move_uploaded_file($src, $dst);
            // Check if image is uploaded or not
            if($upload == false)
            {
                // Image is not uploaded
                // Redirect to this page again and show error message
                $_SESSION['failed-food'] = "<div class='error'>Failed to upload the image</div>";
                // Redirecting to this pafe
                header("location:".SITEURL."admin/add-food.php");
                // stop the process
                die();
            }

        }
    }
    else {
        // Add null to the image file
        $image_name = '';
    }
    // inserting data into database
    $sql2 = "INSERT INTO tbl_food SET
             title = '$title',
             description = '$description',
             price = $price,
             image_name = '$image_name',
             category_id = '$category',
             featured = '$featured',
             active = '$active'
             ";


    $res2 = mysqli_query($conn, $sql2);
    if($res2)
    {
        $_SESSION['add-food'] = "<div class= 'success'> Food added successfully</div>";
        header("location:".SITEURL."admin/manage-food.php");
    }
    else
    {
        $_SESSION['add-food'] = "<div class= 'success'> Failed to add food</div>";
    header("location:".SITEURL."admin/manage-food.php");
    }

    // 4- Redirect to manage-food page

    
}

?>



       
        <!-- Creating form for adding categories -->
    
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="float-form">  
            Title: <br>
            <input type="text" name="title" 
            placeholder="food title"> <br> <br>

            Description: <br>
            <textarea name="description" cols="30" rows="3" 
            placeholder="food description"></textarea> <br> <br>

            Food price: <br>
            <input type="number" name="price" placeholder="Food price"> <br> <br>

            Select Image: <br>
            <input type="file" name="img_name" > <br> <br>

            
        </div>      
        <div class="float-form"> 

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
                  $id = $row['id'];
                  $title = $row['title'];
                  ?>
                  <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
                <input type="radio" name="featured" value="on" id="on"> 
                <label for="on">On</label>
            </span>
            <span>
                <input type="radio" name="featured" value="off" id="off" checked="checked">
                <label for="off">Off</label>
            </span> <br> <br>

            Active: <br>
            <span>
                <input type="radio" name="active" value="on" id="on"> 
                <label for="on">On</label>
            </span>
            <span>
                <input type="radio" name="active" value="off" id="off" checked="checked">
                <label for="off">Off</label>
            </span> <br> <br>

        </div>     
        <div class="clearfix"></div>
            <input type="submit" name="submit" value="Add Food" 
            class="btn-secondary button-middle">
        </form>
        
    </div>
</div>


<?php include('partials/footer.php'); ?>