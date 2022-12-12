<?php include('partials-front/menu.php'); ?>

      <!-- fOOD sEARCH Section Starts Here -->
      <section class="search-bar text-center">
        <div class="container">
            <?php
            // Getting the search keyword
          $search = mysqli_real_escape_string($conn,$_POST['search']);
            ?>
             <form action="<?php echo SITEURL; ?>food-search.php" method= "POST">
            <input type="search" name="search" value="<?php echo $search; ?>" required>
            <input type="submit" name="submit" value="search" class="btn btn-primary">
           </form>
           <br> <br>
            
            <h2>Foods on Your Search <a href="#" class="text-green">
                "<?php echo $search; ?>"
            </a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

   

    <!-- Food menu section starts here -->
    <section class="food-menu">
        <div class="container">

        <?php
          

          // SQL query to get foods based on search keyword
          $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%'
                  OR description LIKE '%$search%' ";
         $res = mysqli_query($conn, $sql);

         $count = mysqli_num_rows($res);
         if($count > 0)
         {
            // Food available based on search
            while($row =  mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $price = $row['price'];
                $description = $row['description'];
    
    
                ?>
                 <!-- Food box lists starts here -->
          <div class="food-menu-box">
             <div class="food-menu-img">
                <?php
             if($image_name != '')
             {
               ?>
               <img src="<?php echo SITEURL; ?>images/foods/<?php echo $image_name; ?>" 
               alt="<?php echo $title; ?>" 
                class="img-curve img-responsive">
    
               <?php
             /*
             This method not working -
             
             echo  '<img src="SITEURL./images/foods/.$image_name" 
                alt=" $title" 
                 class="img-curve img-responsive">';
      */
            }
             else
             {
                echo "<div> Image not available </div>";
             }
                ?>
               </div>
              <div class="food-menu-desc">
              <h4> <?php echo $title; ?> </h4>
              <p class="food-price"><?php echo $price; ?></p> 
              <p class="food-details"><?php echo $description; ?></p><br>
              <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>"
               class="btn btn-primary">Order now</a>
              </div>
          </div>
          <!-- Food box lists ends here -->
             <?php
            }
         }
         else
         {
            // Food not availble
            echo "<div class='error'> Food not found </div>";
         }

        ?>

        </div>
            <div class="clearfix"></div>

    </section>
    <!-- Food menu section ends here -->

    <?php include('partials-front/footer.php'); ?>