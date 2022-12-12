<?php include('partials-front/menu.php'); ?>

     <!-- Categories section starts here -->
     <section class="Categories" id="categ">
        <div class="container">
            <h2 class="text-center">Explore foods</h2>
            <?php 
      // Getting data from the database and displaying it here
      $sql = "SELECT * FROM tbl_category WHERE active = 'on' ";
      $res = mysqli_query($conn, $sql);
      
      // counting the number of rows
      $count = mysqli_num_rows($res);
      if($count > 0)
      {
        // Display categories here using while loop
        while($row =  mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['img_name'];

            ?>
              <a href="<?php echo SITEURL; ?>category-food.php?category_id=
              <?php echo $id; ?>">
            <div class="box3 float-container">
                <?php
                if($image_name != '')
                {
                  ?>  
             <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>" 
             alt="<?php echo $title; ?>" class="img-responsive img-curve">
               <?php
                }
                else
                echo "<div>Image not available</div>";
                ?>

               <h3 class="float-text text-white"><?php echo $title; ?></h3>
               </div>
            </a>

            <?php
        }

      }
      else
      {
        echo "<div class='error'>No categories availble</div>";
      }

    ?>

             
           <div class="clearfix"></div>
            </div>

    </section>
    <!-- Categories section ends here -->

    <?php include('partials-front/footer.php'); ?>