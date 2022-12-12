<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
    <h1>
        Manage Category
    </h1>
    

    
    <a href="<?php echo SITEURL; ?>admin/add-category.php" 
    class="btn-primary"> Add Category </a>
    <br> <br>
<?php
     if(isset($_SESSION['category'])){
        echo $_SESSION['category'];
        unset($_SESSION['category']);
     }
     if(isset($_SESSION['category-delete'])){

        echo $_SESSION['category-delete']; // Displaying message
        unset($_SESSION['category-delete']); // removing message
    }
     if(isset($_SESSION['category-update'])){

        echo $_SESSION['category-update']; // Displaying message
        unset($_SESSION['category-update']); // removing message
    }
     if(isset($_SESSION['remove'])){

        echo $_SESSION['remove']; // Displaying message
        unset($_SESSION['remove']); // removing message
    }
     if(isset($_SESSION['category-update'])){

        echo $_SESSION['category-update']; // Displaying message
        unset($_SESSION['category-update']); // removing message
    }
     
    ?>
    <br>
    <table class="tbl-full">
        <tr>
            <th>SNO</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>

        <?php
        // Retriving data from the database
        $sql = "SELECT * FROM tbl_category";
        
        // Executing the query
        $res = mysqli_query($conn, $sql);

        // counting the number of rows 
        $count = mysqli_num_rows($res);

        if($count > 0)
        {
            // Found data in the database and displaying it
            // Displaying data using while loop
            $n = 1;
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['img_name'];
              $featured = $row['featured'];
              $active = $row['active'];

            ?>
             <tr>
            <td><?php echo $n++; ?></td>
            <td><?php echo $title; ?></td>
            <td>
            <?php
              // check image is available or not
              if($image_name != ""){
                // Diplay the image 
              ?>  
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" 
                alt="<?php echo $image_name; ?>" width="100px">
               <?php 
              }
              else{
                // display image not found
                echo "<div class= 'error'> image not found</div>";
              }
            ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
               <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php 
               echo $id; ?>" class="btn-secondary">Update category</a>  
               <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php 
               echo $id; ?>&img_name=<?php echo $image_name; ?>"
                class="btn-danger">Delete category</a>  
            </td>
        </tr>
            <?php
            }
        }
        else
        {
            // NO data found
            echo "<div class= 'error'> No Categories found</div>";
        }
        ?>

        
        
    </table>
    </div>
    </div>
<?php include('partials/footer.php') ?>