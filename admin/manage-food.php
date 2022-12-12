<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
    <h1>
        Manage food
    </h1>
   

    <a href="<?php echo SITEURL; ?>admin/add-food.php"
     class="btn-primary"> Add Food </a>
    <br> <br>

    <?php 
      if(isset($_SESSION['add-food'])){

        echo $_SESSION['add-food']; // Displaying message
        unset($_SESSION['add-food']); // removing message
    }
      if(isset($_SESSION['delete-food'])){

        echo $_SESSION['delete-food']; // Displaying message
        unset($_SESSION['delete-food']); // removing message
    }
      if(isset($_SESSION['upload-food'])){

        echo $_SESSION['upload-food']; // Displaying message
        unset($_SESSION['upload-food']); // removing message
    }
    ?>

    <table class="tbl-full">
        <tr>
            <th>SNO</th>
            <th>Title</th>
            
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
     <?php
     // displaying data from the database
     $sql = "SELECT * FROM tbl_food";
     $res = mysqli_query($conn, $sql);
     // check query executed successfully or not
     
        // check the number of rows
        $count = mysqli_num_rows($res);
        if($count > 0)
        {
            $n = 1;
            // Data available in database
            while($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

                // displaing above data in table
                ?>
                <tr>
                <td><?php echo $n++ ; ?></td>
                <td><?php echo $title; ?></td>
                
                <td><?php echo $price." Rs"; ?></td>
                <td>
                    <?php 
                    // echo $image_name;
                     // check the image is available or not 
                     if($image_name != '')
                     {
                        // image is available
                        ?>
                       <img src="<?php echo SITEURL; ?>images/foods/<?php echo $image_name; ?>"
                        alt="<?php echo $image_name; ?>image not found" width="80px"> 
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
                   <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php 
                   echo $id; ?>" class="btn-secondary">Update Food</a>  
                   <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php 
                   echo $id; ?>&img_name=<?php echo $image_name; ?>"
                    class="btn-danger">Delete Food</a>  
                </td>
            </tr>

            <?php
            }
        }
        else
        {
            // NO data availabla
            echo "<div class= 'error'>No food found </div>";
        }
     
     
     ?>

       
       
    </table>
    </div>
    </div>
<?php include('partials/footer.php') ?>