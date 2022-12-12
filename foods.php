<?php include('partials-front/menu.php'); ?>

     <!-- Food search section starts here -->
     <section class="foods text-center" >
        <div class="container ">
        <form action="<?php echo SITEURL; ?>food-search.php" method= "POST">
            <input type="search" name="search" placeholder="Search foods here" required>
            <input type="submit" name="submit" value="search" class="btn btn-primary">
            </div>

    </section>
    <!-- Food search section ends here -->


     <!-- Food menu section starts here -->
     <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food menu</h2>

            <!-- php code to retrive data from database -->

            <?php 
      // Getting data from the database and displaying it here
      $sql2 = "SELECT * FROM tbl_food WHERE active = 'on'";
      $res2 = mysqli_query($conn, $sql2);
      
      // counting the number of rows
      $count2 = mysqli_num_rows($res2);
      if($count2 > 0)
      {
        // Display categories here using while loop
        while($row =  mysqli_fetch_assoc($res2))
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
          <p class="food-price">₹ <?php echo $price; ?></p> 
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
        echo "<div class='error'>No foods availble</div>";
      }

    ?>
 
            <div class="clearfix"></div>


    </section>
    <!-- Food menu section ends here -->

    <?php include('partials-front/footer.php'); ?>